<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.7;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        header, footer {
            background-color: #444444;
            color: #f0f0f0;
            text-align: center;
            padding: 15px 0;
            font-size: 18px;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        div {
            margin: 0 15%;
        }
        img {
            max-width: 100%;
            height: auto;
        }

        h1, h2 {
            color: #333;
            text-align: center;
            font-weight: bold;
        }

        h1 {
            margin-top: 0;
            font-size: 32px;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        p, li {
            font-size: 17px;
        }

        hr {
            border: none;
            border-top: 2px solid #ccc;
            margin: 20px 0;
        }

        .code-container {
            background: #1e1e1e;
            color: #f8f8f2;
            border: none;
            padding: 15px;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow-x: auto;
        }

        pre {
            color: #dcdcdc;
            background: #2b2b2b;
            border-left: 4px solid #9c9c9c;
            overflow-x: auto;
            font-family: 'Consolas', monospace;
            white-space: pre-wrap;
        }

        button {
            background-color: #007bff; /* Bootstrap primary color */
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
            padding: 12px;
            margin: 15px 0;
            border-radius: 5px;
            border-left: 5px solid #0c5460;
        }

        .custom-alert p {
            margin-bottom: 0;
        }

        #searchBox {
            width: 100%;
            padding: 12px;
            margin: 20px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
        }

        .imgsmall {
            width: 100%;
            height: auto;
        }
    </style>

    <!-- Include any external CSS or JS here -->
    <title>LAMP Server Setup Instructions</title>
</head>
<body>
<div>
    <header>
        <h1>Embark on Your LAMP Server Adventure: The Ultimate Setup Guide</h1>
        <p>Welcome to the thrilling world of LAMP server setup! Here, you're about to embark on an exciting journey to configure a robust and dynamic LAMP server. LAMP, a powerful quartet of Linux, Apache, MySQL, and PHP, is the cornerstone of modern web development and hosting. This guide is your gateway to mastering this formidable stack, designed for both beginners and seasoned tech enthusiasts. We'll guide you through each step, from initial installation to advanced configurations, unlocking endless possibilities for your web development ambitions. Get ready to transform your server setup experience and unleash the full potential of a LAMP server!</p>

        <h2>Begin with Linux: Update and Upgrade</h2>
        <p>Our adventure begins with a foundational step: updating and upgrading your Linux system. This is a crucial phase for maintaining system stability and ensuring top-notch security. Follow along as we guide you through these essential updates.</p>
        <div class="code-container">
            <pre id="codeBlock1">sudo apt-get update && sudo apt-get dist-upgrade</pre>
            <button onclick="copyToClipboard('#codeBlock1')">Copy</button>
            <p>When prompted, enter your Ubuntu password. This step paves the way for adding new users and bolstering security post-update.</p>
            <img src="GraphicalDocument_Images/Ubuntu_Open_Start_4.jpg" alt="Password prompt in Ubuntu Terminal">
            <p>Authorize the updates by typing [Y] and hitting [Enter], ensuring your system is up-to-date and secure.</p>
            <img src="GraphicalDocument_Images/Ubuntu_Open_Start_5.jpg" alt="Update confirmation in Ubuntu Terminal">
        </div>

        <p><i>Optional:</i> Fortify Your System with a New User Account</p>
        <p>Enhance your server's security by adding a new user. This step is a strategic move to minimize the risk of compromised accounts and maintain a high-security standard. Use the command below to create a new user. Remember to replace "newusername" with the username of your choice.</p>
        <div class="code-container">
            <pre id="codeBlock2">sudo adduser newusername</pre>
            <button onclick="copyToClipboard('#codeBlock2')">Copy</button>
            <p>After executing the command, a new user will be created, as shown in the following image.</p>
            <img src="GraphicalDocument_Images/Ubuntu_Open_Start_8.jpg" alt="Username in Ubuntu Terminal">
        </div>

        <p>Customizing the User Profile</p>
        <p>Once the command is run, you'll be guided through a series of prompts to set a password and fill in user information. You can either provide specific details or simply press ENTER to accept the default values. This flexibility allows you to tailor the user account to your specific needs or quickly move forward with the defaults.</p>
        <div class="code-info">
            <p><i>User Information Prompts:</i> These prompts ask for information like full name, room number, and contact details. You have the freedom to enter this information or skip it with default settings.</p>
        </div>

        <h2>Advanced User Creation: A Deeper Dive</h2>
        <p>For those who crave a more hands-on and technical approach, the 'useradd' command is your gateway to an advanced method of user creation. This approach gives you direct control over user configuration and is ideal for those familiar with Linux command line intricacies.</p>
        <div class="code-container optional">
            <pre id="codeBlock3">sudo useradd -m -s /bin/bash newusername</pre>
            <button onclick="copyToClipboard('#codeBlock3')">Copy</button>
            <p>This command initiates the creation of a new user. The '-m' flag is used to create a home directory for the new user, a space where their files and personal settings are stored. The '-s' flag specifies the default shell for the user, in this case, Bash, which is a common choice for its user-friendliness and flexibility.</p>

            <pre id="codeBlock4">sudo passwd newusername</pre>
            <button onclick="copyToClipboard('#codeBlock4')">Copy</button>
            <p>After creating the user, it's essential to set a secure password. Replace "newusername" with the username you just created. This step is crucial for safeguarding the account and ensuring only authorized access.</p>
        </div>
        <p>This advanced method allows for a more customized and secure approach to user management, catering to those who prefer a more controlled setup. Embrace the power of the command line and tailor your LAMP server to your exact needs!</p>

        <h2>Transforming Your Raspberry Pi into a LAMP Powerhouse</h2>
        <p>Dive into the exciting process of turning your Raspberry Pi into a fully-functional LAMP server. With Raspberry Pi OS Bullseye, you're not just setting up a server; you're unleashing the potential of this compact yet powerful device for web hosting and development.</p>
        <div class="code-container">
            <p>Begin by tailoring your Raspberry Pi's software sources. Open the sources list file in a text editor:</p>
            <pre><code>sudo nano /etc/apt/sources.list.d/raspi.list</code></pre>
            <p>Next, integrate the Bullseye repository into your system for access to the latest compatible packages. This ensures your Raspberry Pi is equipped with the most recent software advancements:</p>
            <pre><code>sudo apt-get update</code></pre>
            <p>Updating your package list is the first step in ensuring that your Raspberry Pi is ready to become a robust LAMP server.</p>
        </div>

        <h2>Optimizing Ubuntu on Windows Subsystem for Linux (WSL)</h2>
        <p>Embrace the power of Ubuntu on the Windows Subsystem for Linux (WSL). This section is tailored for users who prefer the Windows environment but desire the versatility and strength of Linux. Here's how to keep your Ubuntu installation on WSL updated and efficient.</p>
        <div class="code-container">
            <pre><code>sudo apt-get update</code></pre>
            <pre><code>sudo apt-get upgrade</code></pre>
            <p>These commands are essential for maintaining the health of your system. They update the list of available packages and upgrade your current packages to their latest versions, ensuring a smooth and secure operating environment within WSL.</p>
        </div>
        <p>Whether you're setting up a LAMP server on a Raspberry Pi or optimizing Ubuntu on WSL, these steps are crucial in creating a stable and efficient server environment. Embrace the versatility of these platforms and gear up for an enhanced web development experience.</p>


        <h2>Unleashing PHP 8.1: The Latest in Server-Side Scripting</h2>
        <p>Step into the future of server-side scripting with PHP 8.1, a cutting-edge version of one of the most popular scripting languages. This section guides you through installing PHP 8.1 and a suite of essential modules, empowering your server with unparalleled performance and new features.</p>
        <div class="code-container">
            <pre id="codeBlock_phpInstall">sudo apt install -y php8.1 php8.1-cli php8.1-fpm php8.1-mysql php8.1-xml php8.1-mbstring php8.1-curl php8.1-gd php8.1-intl php8.1-zip</pre>
            <button onclick="copyToClipboard('#codeBlock_phpInstall')">Copy</button>
            <p>This command installs PHP 8.1 along with critical modules like CLI, FPM, MySQL, XML processing, and more, ensuring a comprehensive environment for web development.</p>
        </div>

        <h2>Option for PHP 7.3: Stability and Compatibility</h2>
        <p>If your project requirements align better with PHP 7.3, fear not. This section details the installation of PHP 7.3 and its common modules, providing a stable and compatible environment for your web applications.</p>
        <div class="code-container">
            <pre id="codeBlock9">sudo apt install -y -t buster php7.3-fpm php7.3-curl php7.3-gd php7.3-intl php7.3-mbstring php7.3-mysql php7.3-imap php7.3-opcache php7.3-sqlite3 php7.3-xml php7.3-xmlrpc php7.3-zip php-apcu phpmyadmin -y</pre>
            <button onclick="copyToClipboard('#codeBlock9')">Copy</button>
            <p>This comprehensive command ensures the installation of PHP 7.3 along with its key modules, offering a reliable and robust platform for applications that thrive on this version.</p>
        </div>
        <p>Whether opting for the latest PHP 8.1 or the time-tested PHP 7.3, these installations are pivotal in tailoring your LAMP server to meet the specific needs of your web development projects. Choose the version that best fits your requirements and embark on a journey of efficient and effective web programming.</p>

        <h2>Customizing PHP Configuration: Enhance Performance and Security</h2>
        <p>Maximize the efficiency of your server by creating a custom PHP configuration file. This step allows you to fine-tune settings specific to your server's needs, enhancing performance and security.</p>
        <div class="code-container">
            <pre id="codeBlock10">sudo nano /etc/php/7.3/fpm/conf.d/90-pi-custom.ini</pre>
            <button onclick="copyToClipboard('#codeBlock10')">Copy</button>
            <p>Use this command to create a new configuration file for PHP 7.3 FPM. This file will be used to override the default settings with your customizations.</p>
        </div>

        <p>Optimizing PHP Settings</p>
        <div class="code-container">
    <pre id="codeBlock11">cgi.fix_pathinfo=0
upload_max_filesize=64m
post_max_size=64m
max_execution_time=600</pre>
            <button onclick="copyToClipboard('#codeBlock11')">Copy</button>
            <p>Add these lines to the config file. They adjust important settings like maximum file upload size and script execution time, crucial for handling larger files and longer-running scripts.</p>
        </div>

        <p>Refreshing PHP to Apply Changes</p>
        <div class="code-container">
            <pre id="codeBlock12">sudo service php7.3-fpm reload</pre>
            <button onclick="copyToClipboard('#codeBlock12')">Copy</button>
            <p>After updating the configuration, use this command to reload PHP 7.3 FPM. This ensures your changes take effect without restarting the entire server.</p>
        </div>

        <h2>Enabling Apache's Rewrite Module</h2>
        <p>Enhance your server's URL handling capabilities by enabling Apache's rewrite module. This is essential for implementing user-friendly URLs and for applications that rely on .htaccess for URL rewriting.</p>
        <div class="code-container">
            <pre id="codeBlock13">sudo a2enmod rewrite</pre>
            <button onclick="copyToClipboard('#codeBlock13')">Copy</button>
            <p>Activating this module allows for dynamic rewriting of URLs, a key feature for many web applications and frameworks.</p>
        </div>
        <p>These steps are integral to customizing your LAMP server, ensuring it's not only robust and efficient but also tailored perfectly to your web application's requirements. Embrace the power of customization and watch your web projects thrive!</p>


        <h2>Configuring Apache: Setting the Stage for Web Hosting</h2>
        <p>Now, let's focus on configuring Apache, the heart of your web server. This step involves setting permissions, ensuring Apache can find the index.php file in your directory, and establishing Virtual Hosts for hosting multiple websites with distinct port assignments.</p>
        <div class="code-container">
            <pre id="codeBlock14">sudo nano /etc/apache2/apache2.conf</pre>
            <button onclick="copyToClipboard('#codeBlock14')">Copy</button>
            <p>Open the Apache configuration file using this command. This is where you'll set global configurations that affect how Apache serves web content.</p>
        </div>

        <p>Apache Directory Permissions and Settings</p>
        <div class="code-info">
            <p><strong>Global Directory Settings:</strong> This section sets default options and permissions for all directories served by Apache.</p>
            <code>&ltDirectory /&gt
                Options Indexes FollowSymLinks
                AllowOverride All
                Require all granted
                &lt/Directory&gt</code>

            <p><strong>Shared Resource Directory:</strong> Special permissions for the '/usr/share' directory, commonly used for shared resources.</p>
            <code>&ltDirectory /usr/share&gt
                AllowOverride All
                Require all granted
                &lt/Directory&gt</code>

            <p><strong>Public Web Directory:</strong> Permissions for the '/var/www/public' directory, typically the root directory for web content.</p>
            <code>&ltDirectory /var/www/public&gt
                Options Indexes FollowSymLinks
                AllowOverride All
                Require all granted
                &lt/Directory&gt</code>

            <p><strong>Directory Index Files:</strong> Setting Apache to look for 'index.php' and 'index.html' as default directory index files.</p>
            <code>&ltIfModule dir_module&gt
                DirectoryIndex index.php index.html
                &lt/IfModule&gt</code>

            <p><strong>Securing .htaccess Files:</strong> Ensuring that .htaccess files are secure and not accessible to web visitors.</p>
            <code>&ltFilesMatch "^\.ht"&gt
                Order allow,deny
                Deny from all
                Satisfy All
                &lt/FilesMatch&gt</code>
        </div>

        <p>By carefully configuring these settings, you ensure that Apache serves your web content efficiently, securely, and in line with your specific hosting requirements. This step is critical in setting up a robust, multi-functional web server capable of hosting diverse websites and applications.</p>

        <h2>Mastering Virtual Hosts: Creating Multiple Websites on a Single Server</h2>
        <p>Virtual Hosts in Apache are a powerful feature that allows you to host multiple websites on a single server. This section walks you through configuring Virtual Hosts for different domains or projects, each potentially running on its own port.</p>

        <h3>Standard Virtual Host on Port 80</h3>
        <p>First, we'll set up a standard virtual host. Port 80 is the default for HTTP traffic, meaning your website will be accessible without specifying a port number in the URL.</p>
        <div class="code-info">
            <p><strong>Virtual Host Configuration:</strong> This block sets up a virtual host listening on port 80.</p>
            <code>&ltVirtualHost *:80&gt
                ServerName local.project.com
                ServerAdmin admin@project.com
                DocumentRoot /var/www/html/project/public

                &ltDirectory "/var/www/html/project"&gt
                AllowOverride All
                &lt/Directory&gt

                ErrorLog ${APACHE_LOG_DIR}/error.log
                CustomLog ${APACHE_LOG_DIR}/access.log combined
                &lt/VirtualHost&gt</code>
            <p>This configuration specifies the server name, administrator email, document root (where your website's files are stored), and log file settings.</p>
        </div>

        <h3>Optional: Additional Virtual Host on a Custom Port</h3>
        <p>If you're looking to host another website on the same server, you can set up an additional Virtual Host on a custom port, like 89. Websites on non-standard ports are accessed by appending the port number to the URL.</p>
        <div class="code-info">
            <p><strong>Virtual Host Configuration on a Custom Port:</strong> This block creates a virtual host on a specified port (e.g., 89).</p>
            <code>&ltVirtualHost *:89&gt
                ServerName local.project2.com
                ServerAdmin admin@project2.com
                DocumentRoot /var/www/html/project2/public

                &ltDirectory "/var/www/html/project2"&gt
                AllowOverride All
                &lt/Directory&gt

                ErrorLog ${APACHE_LOG_DIR}/error.log
                CustomLog ${APACHE_LOG_DIR}/access.log combined
                &lt/VirtualHost&gt</code>
            <p>This configuration is similar to the standard port 80 setup but is accessed using a specific port number in the URL.</p>
        </div>

        <p>By utilizing Virtual Hosts, you can efficiently manage multiple websites on a single Apache server, each with its own domain and specific configuration. This flexibility is essential for web developers and administrators looking to optimize their server infrastructure.</p>

        <h2>Integrating phpMyAdmin with Apache</h2>
        <p>Integrate phpMyAdmin, a popular database management tool, into your Apache server to facilitate easier management of MySQL databases.</p>
        <div class="code-container">
            <pre id="codeBlock15">Include /etc/phpmyadmin/apache.conf</pre>
            <button onclick="copyToClipboard('#codeBlock15')">Copy</button>
            <p>Add this line at the bottom of the Apache configuration file to include phpMyAdmin settings, enabling its functionality on your server.</p>
        </div>

        <h3>Configuring Additional Virtual Hosts and Ports</h3>
        <p>If you're hosting multiple sites on different ports, it's essential to tell Apache to listen on these additional ports.</p>
        <div class="code-container">
            <pre id="codeBlock16">sudo nano /etc/apache2/ports.conf</pre>
            <button onclick="copyToClipboard('#codeBlock16')">Copy</button>
            <p>Edit the ports configuration file to specify which ports Apache should listen to.</p>
        </div>
        <div class="code-container">
            <pre id="codeBlock17">Listen 89</pre>
            <button onclick="copyToClipboard('#codeBlock17')">Copy</button>
            <p>Add a 'Listen' directive for each additional port, matching those specified in your virtual host configurations.</p>
        </div>

        <h3>Restarting Apache to Apply Changes</h3>
        <div class="code-container">
            <pre id="codeBlock18">sudo /etc/init.d/apache2 restart</pre>
            <button onclick="copyToClipboard('#codeBlock18')">Copy</button>
            <p>Once configuration changes are made, restart Apache to apply them. This ensures your virtual hosts and port settings take effect.</p>
        </div>

        <h3>Creating a Database User for phpMyAdmin Access</h3>
        <p>Creating a dedicated user for phpMyAdmin access can avoid issues with root user authentication in MariaDB.</p>
        <div class="code-container">
            <pre id="codeBlock19">sudo systemctl stop mariadb</pre>
            <button onclick="copyToClipboard('#codeBlock19')">Copy</button>
        </div>
        <div class="code-container">
            <pre id="codeBlock20">sudo mysqld_safe --skip-grant-tables --skip-networking &</pre>
            <button onclick="copyToClipboard('#codeBlock20')">Copy</button>
        </div>
        <div class="code-container">
            <pre id="codeBlock21">mysql -u root</pre>
            <button onclick="copyToClipboard('#codeBlock21')">Copy</button>
        </div>
        <div class="code-container">
            <pre id="codeBlock22">FLUSH PRIVILEGES;</pre>
            <button onclick="copyToClipboard('#codeBlock22')">Copy</button>
        </div>
        <div class="code-container">
            <pre id="codeBlock23">CREATE USER 'newuser'@'localhost' IDENTIFIED BY 'complex_password';</pre>
            <button onclick="copyToClipboard('#codeBlock23')">Copy</button>
        </div>
        <div class="code-container">
            <pre id="codeBlock24">GRANT ALL PRIVILEGES ON * . * TO 'newuser'@'localhost';</pre>
            <button onclick="copyToClipboard('#codeBlock24')">Copy</button>
        </div>
        <div class="code-container">
            <pre id="codeBlock25">FLUSH PRIVILEGES;</pre>
            <button onclick="copyToClipboard('#codeBlock25')">Copy</button>
        </div>
        <div class="code-container">
            <pre id="codeBlock26">mysql -u newuser -p</pre>
            <button onclick="copyToClipboard('#codeBlock26')">Copy</button>
            <p>Verify your new user by logging into MySQL with the new credentials.</p>
        </div>

        <h3>Installing Composer and Laravel</h3>
        <p>Composer, a dependency manager for PHP, is essential for installing and managing Laravel, a popular PHP framework.</p>
        <div class="code-container">
            <pre id="codeBlock27">sudo curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer</pre>
            <button onclick="copyToClipboard('#codeBlock27')">Copy</button>
        </div>
        <div class="code-container">
            <pre id="codeBlock28">composer global require "laravel/installer"</pre>
            <button onclick="copyToClipboard('#codeBlock28')">Copy</button>
        </div>
        <div class="code-container">
            <pre id="codeBlock29">echo 'export PATH="$PATH:$HOME/.composer/vendor/bin"' >> ~/.bashrc</pre>
            <button onclick="copyToClipboard('#codeBlock29')">Copy</button>
        </div>

        <h3>Local DNS Configuration for Easy Access</h3>
        <p>Configure your local DNS settings to access your project using a friendly URL rather than an IP address.</p>
        <div class="code-info">
            <p>Modify the hosts file located at C:\Windows\System32\drivers\etc\hosts on your Windows machine to map the server IP to a custom domain name.</p>
        </div>

        <h3>Setting Up a Web Project in Laravel</h3>
        <p>Now, navigate to your project directory to begin setting up your Laravel application.</p>
        <div class="code-container">
            <pre id="codeBlock30">cd /var/www/html/project</pre>
            <button onclick="copyToClipboard('#codeBlock30')">Copy</button>
        </div>
        <p>Note: Composer installation on a Raspberry Pi Zero may require manual transfer of the 'vendor' folder due to hardware limitations.</p>
        <div class="code-container">
            <pre id="codeBlock31">composer create-project --prefer-dist laravel/laravel blog "5.5.*"</pre>
            <button onclick="copyToClipboard('#codeBlock31')">Copy</button>
        </div>
        <div class="code-container">
            <pre id="codeBlock32">php artisan key:generate</pre>
            <button onclick="copyToClipboard('#codeBlock32')">Copy</button>
        </div>

        <h3>Configuring Laravel Environment and Permissions</h3>
        <p>Edit your project's .env file to configure database settings, then adjust permissions for Laravel's storage and cache directories.</p>
        <div class="code-container">
            <pre id="codeBlock33">sudo nano .env</pre>
            <button onclick="copyToClipboard('#codeBlock33')">Copy</button>
        </div>
        <div class="code-container">
            <pre id="codeBlock34">sudo chgrp -R www-data /var/www/html/project/storage</pre>
            <button onclick="copyToClipboard('#codeBlock34')">Copy</button>
        </div>
        <div class="code-container">
            <pre id="codeBlock35">sudo chgrp -R www-data /var/www/html/project/bootstrap/cache</pre>
            <button onclick="copyToClipboard('#codeBlock35')">Copy</button>
        </div>

        <p>Following these steps meticulously will ensure a successful setup of a robust and functional LAMP server, integrated with Laravel, and ready for your web development projects.</p>

        <h3>Finalizing Laravel Configuration and Permissions</h3>
        <p>Before you can enjoy your newly set up web application, there's one more crucial step: adjusting file permissions and clearing cache to ensure smooth operation.</p>
        <div class="code-container">
            <pre id="codeBlock36">sudo chmod 755 -R /var/www/html/project/storage</pre>
            <button onclick="copyToClipboard('#codeBlock36')">Copy</button>
            <p>This command sets the necessary permissions on the Laravel storage directory, allowing the application to access and manage session and view files.</p>
        </div>
        <p>Note: On a Raspberry Pi, you might need to set permissions to 777 for the storage directory due to specific hardware permissions.</p>
        <div class="code-container">
            <pre id="codeBlock37">php artisan cache:clear</pre>
            <button onclick="copyToClipboard('#codeBlock37')">Copy</button>
            <p>Clear Laravel's cache to ensure all new configurations are applied and old data is removed.</p>
        </div>
        <div class="code-container">
            <pre id="codeBlock38">composer dumpautoload</pre>
            <button onclick="copyToClipboard('#codeBlock38')">Copy</button>
            <p>Finally, regenerate the autoload files with Composer. This step is important for Laravel to recognize all classes in your project.</p>
        </div>

        <h2>Congratulations on Completing Your LAMP Server and Laravel Installation!</h2>
        <p>You have successfully navigated through the comprehensive process of setting up a LAMP server, integrating phpMyAdmin, configuring Apache with Virtual Hosts, securing MySQL with a dedicated phpMyAdmin user, and installing Composer and Laravel. You've also fine-tuned the Laravel application's environment and permissions, ensuring it's ready to deliver your web development projects with efficiency and security.</p>
        <p>This journey has equipped you with a robust server, capable of hosting dynamic websites and applications, powered by the versatility of Linux, Apache, MySQL, and PHP, and enhanced by the elegance of Laravel. Your diligence and effort in following these steps have set the foundation for a powerful web development environment. Embrace the opportunities this setup offers, and let your web development creativity flourish!</p>

        <footer>
    <p>Created by: Chris Hawker for English 2100 SLCC / Graphical Document</a></p>
    <div id="customAlert" class="custom-alert" style="display: none;">
        <p id="alertMessage"></p>
        <button onclick="closeAlert()">OK</button>
    </div>

    <script>
        function copyToClipboard(element) {
            var text = document.querySelector(element).innerText;
            var elem = document.createElement("textarea");
            document.body.appendChild(elem);
            elem.value = text;
            elem.select();
            document.execCommand("copy");
            document.body.removeChild(elem);

            showAlert("Copied to clipboard");
        }

        function showAlert(message) {
            var alertBox = document.getElementById('customAlert');
            var messageParagraph = document.getElementById('alertMessage');
            messageParagraph.innerText = message;
            alertBox.style.display = 'block';
        }

        function closeAlert() {
            var alertBox = document.getElementById('customAlert');
            alertBox.style.display = 'none';
        }

        function searchFunction() {
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById("searchBox");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("pre")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
    </script>
</body>
</html>
