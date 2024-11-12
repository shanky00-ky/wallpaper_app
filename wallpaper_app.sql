create database wallpaper_app
CREATE USER 'wallpaper_app'@'localhost' IDENTIFIED BY 'your_password';
GRANT ALL PRIVILEGES ON wallpaper_app.* TO 'wallpaper_app'@'localhost';
FLUSH PRIVILEGES;
