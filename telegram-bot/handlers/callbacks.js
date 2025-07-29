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
    const messageId = query.message.message_id;
    const data = query.data;

    // Всегда сразу отвечаем на callback — чтобы Telegram убрал "часики"
    bot.answerCallbackQuery(query.id);

    // Статичный блок "О нас"
    if (data === 'about') {
        return bot.editMessageText(
            'Organic Beauty Studio — уютное пространство, где красота и забота о себе сочетаются с профессионализмом 🌸',
            {
                chat_id: chatId,
                message_id: messageId
            }
        );
    }

    try {
        // Загружаем кнопки из базы по ключу menu=...
        const res = await axios.get(`${WEBAPP_URL}/api/bot-buttons?menu=${data}`);
        const buttons = res.data;

        if (buttons.length === 0) {
            return bot.editMessageText('Раздел временно недоступен.', {
                chat_id: chatId,
                message_id: messageId,
            });
        }

        // Собираем inline-клавиатуру
        const inline_keyboard = buttons.map(btn => {
            return [btn.type === 'web_app'
                ? { text: btn.text, web_app: { url: btn.value } }
                : { text: btn.text, callback_data: btn.value }
            ];
        });

        // Меняем сообщение и кнопки
        return bot.editMessageText('Выберите категорию:', {
            chat_id: chatId,
            message_id: messageId,
            reply_markup: {
                inline_keyboard
            }
        });

    } catch (err) {
        console.error('Ошибка загрузки кнопок:', err);
        return bot.editMessageText('Произошла ошибка, попробуйте позже.', {
            chat_id: chatId,
            message_id: messageId
        });
    }
}


