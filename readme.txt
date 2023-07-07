Topic:
Develop a live chat PWA app with real-time messaging experience. The application can be opened on two different browsers and both windows can send and receive text messages in real-time without refreshing the page.

Requirements:
- Use VueJS 2 and Laravel
- All messages are stored in MYSQL Database
- Preload 5,000 messages into chat conversation, and implement an optimized scrolling logic that will not lag during scroll e.g. pagination, vertical scroller, etc
- When sending an Emoji into chat, a bunch of floating emojis will appear from the bottom screen of all chat browsers, and fade as it travels up: https://www.youtube.com/watch?v=FDmLnW467gA
- Application should have PWA enabled: Manifest, service workers, etc.
- Application should look like native app as much as possible (via Vuetify)
- (BONUS) Use Redis + Socket.IO for Laravel Event Broadcasting to achieve real-time messaging.
- Upload project in a public Github repository, and attach Github link
- (BONUS) Upload project to live AWS Free Tier, or other live server configuration and send us link for testing
- Describe the issues during developing the project, and how you managed to overcome it.

Important Note:
- Code the whole task strictly in Laravel architecture instead of pure PHP.
- Copy your current .env and save into .env.example
- If you can't use Redis + Socket for real-time messaging, think of other approaches 
that can emulate real-time response (short polling, timer, etc).
- Your deadline will be by 11th October 2022 (Tuesday), 11:59pm.
- Any questions/struggles feel free to contact me via my phone number.
- Please reply in email once you have received this email.