<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

# Initialize Project
<aside>
🪟 For Windows, use WSL (Windows Subsystem for Linux) only.
Verify with the command `whoami` that you receive a UNIX Username that has been previously set up.
If you get 'root' as the result, it indicates incorrect configuration.
</aside>

### 1. Set up an alias for the `sail` command:

   <aside>
   🪟 (wsl) Run 'echo "alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'" >> ~/.bashrc'

   </aside>

   <aside>
   ⚡ (zsh) Run `echo "alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'" >> ~/.zshrc`
   </aside>

### 2. Close and reopen the terminal for changes to take effect.

### 3. Run the following command to install the Composer dependencies using Laravel Sail's PHP 8.2 container:

   ```bash
   docker run --rm \
       -u "$(id -u):$(id -g)" \
       -v "$(pwd):/var/www/html" \
       -w /var/www/html \
       laravelsail/php82-composer:latest \
       composer install --ignore-platform-reqs
   ```

### 2. Create a `.env` file by executing the following command:

   ```bash
   cp .env.example .env
   ```

### 3. Edit the `.env` file with the following values:

    1. `APP_NAME="Laravel Layout"` (Line 1)
    2. `DB_HOST=mysql` (Line 12)
    3. `DB_USERNAME=sail` (Line 15)
    4. `DB_PASSWORD=password` (Line 16)
    5. `REDIS_HOST=redis` (Line 27)

### 4. Run the command `sail up -d` (Make sure that services from other projects are already down).
    - If you encounter issues in step 4, make sure to perform the following steps:
        - Run `sail down`
        - Delete Docker Volumes with names matching your project directory name suffixed with `_sail-mysql`, e.g., `EventHub-...._sail-mysql`
        - Run `sail build --no-cache`
        - Run `sail up -d` again

### 5. Generate the `APP_KEY` in the `.env` file by running the command:

   ```bash
   sail artisan key:generate
   ```

### 6. Use Yarn instead of npm

Use the following command to use Yarn for installing dependencies:

```bash
sail yarn install
```

### 7. Command for Processing CSS with Yarn

Use the following command to process CSS using Yarn:

```bash
sail yarn dev
```

### 8. You can use dummy data with

```bash
sail artisan migrate:fresh --seed
```

### or you can use empty data with

```bash
sail artisan migrate
```


## How To Use

### For General Users:

- Ordinary users can register by clicking on the "Register" option located at the upper right corner of the webpage. After registering, they will have the option to log in. Once logged in, they can participate in events.

- If a user doesn't log in, they can still view events, but they won't be able to actively engage with them.

### For Event Owners:

- Event owners are regular users who have logged in. They can create events and manage them. This means they have the ability to both create new events and handle existing ones.
