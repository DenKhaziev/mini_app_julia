export default function (bot, msg) {
    const chatId = msg.chat.id;
  
    bot.sendMessage(chatId, 'Здравствуйте! Я бот студии красоты Organic Beauty Studio 🌿\nВыберите действие:', {
      reply_markup: {
        inline_keyboard: [
          [{ text: 'Главная страница', web_app: { url: 'https://48af7c834842.ngrok-free.app/' } }],
          [{ text: 'Наши работы', web_app: { url: 'https://48af7c834842.ngrok-free.app/works' } }],
          [{ text: 'О нас', callback_data: 'about' }]
        ]
      }
    });
  }
  