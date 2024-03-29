# ChoreFlow [![wakatime](https://wakatime.com/badge/user/1d450513-0859-4fa4-a5aa-402cb3ea4b38/project/018dc122-5d50-4376-83f2-5d8e63e0f233.svg)](https://wakatime.com/badge/user/1d450513-0859-4fa4-a5aa-402cb3ea4b38/project/018dc122-5d50-4376-83f2-5d8e63e0f233)

ChoreFlow is a chore management system that allows parents to assign chore to their children and track its progress.

> This project is required for Web Technologies course at Ashesi

## Running The Project

### Setup

#### Dependencies

- Nodejs (to run tailwind css).
- xampp (to run the php server & mysql server).

> See [Node.js Installation](https://nodejs.org/en/download/package-manager) to install nodejs.
> See [XAMPP Installation](https://www.apachefriends.org/index.html) to install xampp.

#### Starting XAMPP Server

- Start the apache and mysql servers in xampp.
- For windows and mac users, the xampp control panel is used to start the servers.
- For linux users, you can figure it out :). (Hint: Find detailed instructions here: [Setting up XAMPP as a service](https://gist.github.com/DaveSaah/161dd4c0662f07b7928436da302756d0).)

#### Load The Database

- Navigate to `http://localhost/phpmyadmin` in your browser.
- Upload `db/chores_mgt.sql` to create the required database.

> If you have a different username or password for your mysql server, you will need to update them in the `settings/connection.php` file.

### Instructions for Production (or just using)

1. Clone the repository into your `htdocs` folder.
2. Visit `http://localhost/choreflow` in your browser.

### Instructions For Development

1. Clone the repository into your `htdocs` folder.
2. Navigate to the project directory in your terminal (in `htdocs`).
3. Run `npm i` to install tailwind.
4. Start the tailwind development build by running `npm run dev` in the terminal.
5. Visit `http://localhost/choreflow` in your browser.
6. Make changes in your preferred text editor.
