// export default function (bot, msg) {
//     const chatId = msg.chat.id;
//
//     bot.sendMessage(chatId, 'Здравствуйте! Я бот студии красоты Organic Beauty Studio 🌿\nВыберите действие:', {
//       reply_markup: {
//         inline_keyboard: [
//           [{ text: 'Главная страница', web_app: { url: 'https://53092189f0be.ngrok-free.app/'}}],
//           [{ text: 'Наши работы', callback_data: 'ourWorks'  }],
//           [{ text: 'О нас', callback_data: 'about' }]
//         ]
//       }
//     });
//   }


import axios from 'axios';

export default async function (bot, msg) {
    const chatId = msg.chat.id;

    // Запрашиваем кнопки (Laravel отдаёт JSON с text, type, value)
    const response = await axios.get(`${process.env.APP_URL}/api/bot-buttons?menu=main`);
    const buttons = response.data;

    // Собираем inline_keyboard
    const inline_keyboard = buttons.map(btn => {
        if (btn.type === 'web_app') {
            return [{ text: btn.text, web_app: { url: btn.value } }];
        } else {
            return [{ text: btn.text, callback_data: btn.value }];
        }
    });

    bot.sendMessage(chatId, 'Здравствуйте! Я бот студии красоты Organic Beauty Studio 🌿\nВыберите действие:', {
        reply_markup: {
            inline_keyboard
        }
    });
}
