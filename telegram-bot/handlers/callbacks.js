export default function (bot, query) {
    const chatId = query.message.chat.id;
    const data = query.data;
  
    if (data === 'about') {
      bot.sendMessage(chatId, 'Organic Beauty Studio — уютное пространство, где красота и забота о себе сочетаются с профессионализмом 🌸');
    }
  
    bot.answerCallbackQuery(query.id);
  }
  