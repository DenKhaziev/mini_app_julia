import 'dotenv/config';

import TelegramBot from 'node-telegram-bot-api';
import menuHandler from './handlers/menu.js';
import callbackHandler from './handlers/callbacks.js';

const token = process.env.TELEGRAM_BOT_TOKEN;
const bot = new TelegramBot(token, { polling: true });

bot.onText(/\/start|\/menu/, (msg) => menuHandler(bot, msg));
bot.on('callback_query', (query) => callbackHandler(bot, query));
