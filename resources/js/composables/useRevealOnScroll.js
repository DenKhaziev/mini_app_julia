import { ref, nextTick, watchEffect } from 'vue'

export function useRevealOnScroll(itemsRef) {
    const revealedIndexes = ref([])
    let observer = null

    function markRevealed(index) {
        if (!revealedIndexes.value.includes(index)) {
            revealedIndexes.value.push(index)
        }
    }

    function setupObserver() {
        observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                const index = Number(entry.target.dataset.index)
                if (entry.isIntersecting) {
                    const img = entry.target.querySelector('img')
                    if (img?.complete) {
                        markRevealed(index)
                    } else if (img) {
                        img.onload = () => markRevealed(index)
                    }
                    observer.unobserve(entry.target)
                }
            })
        }, { threshold: 0.2 })
    }

    function observeElements() {
        const els = document.querySelectorAll('.reveal-section')
        els.forEach(el => observer.observe(el))
    }

    // автоматическая инициализация при itemsRef изменении
    watchEffect(() => {
        if (Array.isArray(itemsRef.value) && itemsRef.value.length > 0) {
            nextTick(() => {
                observeElements()
            })
        }
    })
    // watchEffect(() => {
    //     const items = itemsRef.value
    //     if (Array.isArray(items) && items.length) {
    //         nextTick(() => {
    //             const els = document.querySelectorAll('.reveal-section')
    //             console.log('🧠 Обнаружено элементов:', els.length)
    //             els.forEach(el => observer.observe(el))
    //         })
    //     }
    // })

    setupObserver()

    return {
        revealedIndexes
    }
}
