// export default function (bot, query, WEBAPP_URL) {
//     const chatId = query.message.chat.id;
//     const data = query.data;
//
//     if (data === 'about') {
//       bot.sendMessage(chatId, 'Organic Beauty Studio — уютное пространство, где красота и забота о себе сочетаются с профессионализмом 🌸');
//     }
//     if (data === 'ourWorks') {
//         bot.sendMessage(chatId, 'Выберите категорию работ:', {
//             reply_markup: {
//                 inline_keyboard: [
//                     [{ text: 'Ресницы', web_app: { url: `${WEBAPP_URL}/works` } }],
//                     [{ text: 'Сложные окрашивания', web_app: { url: `${WEBAPP_URL}/works` } }],
//                     [{ text: 'В один тон', web_app: { url: `${WEBAPP_URL}/works` } }],
//                     [{ text: 'Поцелуй солнца', web_app: { url: `${WEBAPP_URL}/works` } }],
//                     [{ text: 'Стрижки', web_app: { url: `${WEBAPP_URL}/works` } }],
//                     [{ text: 'Назад', callback_data: 'mainMenu' }]
//                 ]
//             }
//         });
//     }
//
//     // возврат в главное меню
//     if (data === 'mainMenu') {
//         bot.sendMessage(chatId, 'Главное меню:', {
//             reply_markup: {
//                 inline_keyboard: [
//                     [{ text: 'Главная страница', web_app: { url: `${WEBAPP_URL}` } }],
//                     [{ text: 'Наши работы', callback_data: 'ourWorks' }],
//                     [{ text: 'О нас', callback_data: 'about' }]
//                 ]
//             }
//         });
//     }
//
//     bot.answerCallbackQuery(query.id);
//   }

import axios from 'axios';

export default async function (bot, query, WEBAPP_URL) {
    const chatId = query.message.chat.id;
    const data = query.data;

    bot.answerCallbackQuery(query.id); // можно вызывать сразу

    if (data === 'about') {
        return bot.sendMessage(chatId, 'Organic Beauty Studio — уютное пространство...');
    }

    // всё остальное — универсально через menu_key
    try {
        const res = await axios.get(`${WEBAPP_URL}/api/bot-buttons?menu=${data}`);
        const buttons = res.data;

        if (buttons.length === 0) {
            return bot.sendMessage(chatId, 'Раздел временно недоступен.');
        }

        const inline_keyboard = buttons.map(btn => {
            return [btn.type === 'web_app'
                ? { text: btn.text, web_app: { url: btn.value } }
                : { text: btn.text, callback_data: btn.value }
            ];
        });

        bot.sendMessage(chatId, 'Выберите категорию:', {
            reply_markup: {
                inline_keyboard
            }
        });
    } catch (err) {
        console.error('Ошибка загрузки кнопок:', err);
        bot.sendMessage(chatId, 'Произошла ошибка, попробуйте позже.');
    }
}

