<!DOCTYPE html>
<html>
<head>
    <style>
        .code-container {
            position: relative;
            background: #f4f4f4;
            border: 1px solid #ddd;
            padding: 10px;
            width: 50%; /* Set the width to 50% of the parent container */
            margin: auto; /* Center the container */
        }

        pre {
            white-space: pre-wrap;
            white-space: -moz-pre-wrap;
            white-space: -pre-wrap;
            white-space: -o-pre-wrap;
            word-wrap: break-word;
            overflow-x: auto;
        }

        button {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
    <!-- Include any external CSS or JS here -->
    <title>LAMP Server Setup Instructions</title>
</head>
<body>
<div>
    <h2>Lamp</h2>
    <ul>
        <li><p>First thing is to update and upgrade the Linux installation...</p>
            <div class="code-container">
                <pre id="codeBlock1">sudo apt-get update && sudo apt-get dist-upgrade</pre>
                <button onclick="copyToClipboard('#codeBlock1')">Copy</button>
            </div>
            <p> - optionally, Using the command <i>adduser username</i> add a new user...</p>
            <hr>
            <div class="code-container">
                <pre id="codeBlock2">sudo adduser username</pre>
                <button onclick="copyToClipboard('#codeBlock2')">Copy</button>
            </div>
                            <p> the useradd command will then prompt you for a password and confirmation. Because we
                                used adduser instead of useradd it will prompt for password automatically.</p>
                            <div class=" code-info alert alert-info border border-dark" style="font-weight:bold"><i
                                        style="font-weight:normal;">Set password prompts:</i><br>
                                Enter new UNIX password:<br>
                                Retype new UNIX password:<br>
                                passwd: password updated successfully<br></div>
                            <p> The interface then prompts for user information, default is ok</p>
                            <div class=" code-info alert alert-info border border-dark" style="font-weight:bold"><i
                                        style="font-weight:normal;">User information prompts:</i><br>
                                Changing the user information for username<br>
                                Enter the new value, or press ENTER for the default<br>
                                Full Name []:<br>
                                Room Number []:<br>
                                Work Phone []:<br>
                                Home Phone []:<br>
                                Other []:<br>
                                Is the information correct? [Y/n]<br></div>
                            <p>To get started with installing and configuring the LAMP Server on the Raspberry Pi We
                                install Apache, MySQL, PHP, PHPmyadmin and a few additional files for PHP. Ive found
                                this can be done in
                                one step for the most part. The following takes a few minutes.</p>
                            <p>First Create a new Source List:</p>
                            <div class="code-container"><pre id="codeBlock">
                                sudo nano /etc/apt/sources.list.d/10-buster.list</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <p>In that file add the following</p>
                            <div class="code-container"><pre id="codeBlock">
                                deb http://mirrordirector.raspbian.org/raspbian/ buster main contrib non-free rpi</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <p>Next Create the file</p>
                            <div class="code-container"><pre id="codeBlock">
                                sudo nano /etc/apt/preferences.d/10-buster</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <p>Add the following to that file</p>
                            <div class="code-container"><pre id="codeBlock">
                                Package: *
                                Pin: release n=stretch
                                Pin-Priority: 900

                                Package: *
                                Pin: release n=buster
                                Pin-Priority: 750</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>

                            <p style="color:red"> if unable to locate packages do the following</p>
                            <div class="code-container"><pre id="codeBlock">
                                sudo nano /etc/apt/sources.list</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <p>Make the System aware of the source list by updating</p>
                            <div class="code-container"><pre id="codeBlock">
                                sudo apt-get update</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <div class="code-container"><pre id="codeBlock">
                                sudo apt install -y -t buster php7.3-fpm php7.3-curl php7.3-gd php7.3-intl php7.3-mbstring php7.3-mysql php7.3-imap php7.3-opcache php7.3-sqlite3 php7.3-xml php7.3-xmlrpc php7.3-zip php-apcu phpmyadmin -y
                            </pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <p>Create an extra Config File</p>
                            <div class="code-container"><pre id="codeBlock">
                                sudo nano /etc/php/7.3/fpm/conf.d/90-pi-custom.ini</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <p>Add this to the new config file</p>
                            <div class="code-container"><pre id="codeBlock">
                                cgi.fix_pathinfo=0

                                upload_max_filesize=64m
                                post_max_size=64m
                                max_execution_time=600</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <p> finally reload php</p>
                            <div class="code-container"><pre id="codeBlock">
                                sudo service php7.3-fpm reload</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <p>- enable rewrite, this is part of the .htaccess configuration that is needed to
                                rewrite URLs into a more code based query.</p>

                            <div class="code-container"><pre id="codeBlock">
                                sudo a2enmod rewrite</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>

                            <p>Next is apache configuration, this involves granting permissions to users, allowing
                                apache to look for index.php in the directory, and setting up Virtual hosts that
                                allow for
                                multiple websites seperated by ports.</p>

                            <div class="code-container"><pre id="codeBlock">
                                sudo nano /etc/apache2/apache2.conf</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <div class=" code-info alert alert-info border border-dark" style="font-weight:bold">
                                &ltDirectory /&gt <br>
                                <p style="margin-left:40px;">Options Indexes FollowSymLinks<br>
                                    AllowOverride All<br>
                                    Require all granted</p>
                                &lt/Directory&gt<br>
                                <br>
                                &ltDirectory /usr/share&gt<br>
                                <p style="margin-left:40px;">AllowOverride All<br>
                                    Require all granted</p>
                                &lt/Directory&gt<br>
                                <br>
                                &ltDirectory /var/www/public&gt<br>
                                <p style="margin-left:40px;">Options Indexes FollowSymLinks<br>
                                    AllowOverride All<br>
                                    Require all granted</p>
                                &lt/Directory&gt<br>
                                <br>
                                &ltIfModule dir_module&gt<br>
                                <p style="margin-left:40px;"> DirectoryIndex index.php index.html</p>
                                &lt/IfModule&gt<br>
                                <br>
                                &ltFilesMatch "^\.ht"&gt<br>
                                <p style="margin-left:40px;">Order allow,deny<br>
                                    Deny from all<br>
                                    Satisfy All</p>
                                &lt/FilesMatch&gt
                            </div>

                            <p>This is where we configure the virtual host, :80 is the regular port that websites
                                are accessed on and does not require any special port fowarding or URL
                                modification.</p>

                            <div class=" code-info alert alert-info border border-dark" style="font-weight:bold">
                                &ltVirtualHost *:80&gt<br>

                                <p style="margin-left:40px;">ServerName <i
                                            style="color:orange">local.project.com</i><br>
                                    ServerAdmin <i style="color:orange">admin@project.com</i><br>
                                    DocumentRoot /var/www/html/<i style="color:orange">project</i>/public<br>

                                    &ltDirectory "/var/www/html/<i style="color:orange">project</i>"&gt<br>
                                <p style="margin-left:40px;">AllowOverride All</p>
                                &lt/Directory&gt<br>

                                <p style="margin-left:40px;">ErrorLog ${APACHE_LOG_DIR}/error.log<br>
                                    CustomLog ${APACHE_LOG_DIR}/access.log combined</p>

                                &lt/VirtualHost&gt
                            </div>

                            <p> the next Virtual host is optional if you plan on using more than one webpage, by
                                using a port which can be any port, I prefer to keep it around 81 to 100. Additional
                                websites using
                                ports are accessed by adding : and the port number you configure here after the
                                initial URL.</p>
                            <div class=" code-info alert alert-info border border-dark" style="font-weight:bold">
                                &ltVirtualHost *:<i style="color:orange">89</i>&gt<br>

                                <p style="margin-left:40px;">ServerName <i
                                            style="color:orange">local.project2.com</i><br>
                                    ServerAdmin <i style="color:orange">admin@project2.com</i><br>
                                    DocumentRoot /var/www/html/<i style="color:orange">project2</i>/public</p>

                                &ltDirectory "/var/www/html/<i style="color:orange">project2</i>"&gt
                                <p style="margin-left:40px;"> AllowOverride All</p>
                                &lt/Directory&gt<br>

                                <p style="margin-left:40px;">ErrorLog ${APACHE_LOG_DIR}/error.log<br>
                                    CustomLog ${APACHE_LOG_DIR}/access.log combined</p>

                                &lt/VirtualHost&gt
                            </div>
                            <p>Insert the following at the bottom of the config file for phpmyadmin</p>
                            <div class="code-container"><pre id="codeBlock">Include
                                /etc/phpmyadmin/apache.conf</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <p>additionally if you use additional virtual hosts you will need to configure the ports
                                file so the server knows to listen on the ports you assign</p>
                            <div class="code-container"><pre id="codeBlock">
                                sudo nano /etc/apache2/ports.conf</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <p>insert the following following the section "Listen 80" making sure the port matches
                                what you chose in the additional virtual host.</p>
                            <div class="code-container"><pre id="codeBlock">Listen <i
                                            style="color:orange">89</i>
                            </div>
                            <p>- restart apache2 after configuriation is complete.</p></pre>
                            <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            <div class="code-container"><pre id="codeBlock">
                                sudo /etc/init.d/apache2 restart</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <p>- the easiest way I have found to log into phpmyadmin is to simply create a new user.
                                Ive had issues with using root
                                mainly because mariadb does not use a password and phpmyadmin seems to generate a
                                root pw randomly and there is no way to know it,
                                the following logs into mysql as root and creates a new user and pw that you can use
                                for both mysql and phpmyadmin with same root privelages.
                                create new database user to log into phpmyadmin with</p>
                            <div class="code-container"><pre id="codeBlock">
                                sudo systemctl stop mariadb</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <div class="code-container"><pre id="codeBlock">
                                sudo mysqld_safe --skip-grant-tables --skip-networking &</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <div class="code-container"><pre id="codeBlock">
                                mysql -u root</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <div class="code-container"><pre id="codeBlock">
                                FLUSH PRIVILEGES;</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <div class="code-container"><pre id="codeBlock">
                                CREATE USER '<i style="color:orange">newuser</i>'@'localhost' IDENTIFIED BY '<i
                                            style="color:orange">complex_password</i>';</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <div class="code-container"><pre id="codeBlock">
                                GRANT ALL PRIVILEGES ON * . * TO '<i
                                            style="color:orange">newuser</i>'@'localhost';</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <div class="code-container"><pre id="codeBlock">
                                FLUSH PRIVILEGES;</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <p>exit out of mysql and we can check for success by quickly logging back in with the
                                newuser name and password</p>

                            <div class="code-container"><pre id="codeBlock">
                                mysql -u<i style="color:orange">newuser</i> -p</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <p>- install composer</p>
                            <div class="code-container"><pre id="codeBlock">
                                sudo curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin
                                --filename=composer</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <p>-install laravel</p>
                            <div class="code-container"><pre id="codeBlock">
                                composer global require "laravel/installer"</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <div class="code-container"><pre id="codeBlock">
                                echo 'export PATH="$PATH:$HOME/.composer/vendor/bin"' >> ~/.bashrc</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <p>- this is to add a URL to the local system so you dont have to type the IP address
                                and can type a regular URL when accessing your page on the local network.
                                Go to the following file in your windows directory.</p>
                            <div class=" code-info alert alert-info border border-dark" style="font-weight:bold">
                                C:\Windows\System32\drivers\etc\hosts
                            </div>
                            <p>- next is to Install a webpage at the home directory that will be served by the
                                server /var/www/html/<i style="color:orange">project</i> -</p>
                            <div class="code-container"><pre id="codeBlock">
                                cd /var/www/html/<i style="color:orange">project</i></pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <p style="color:red;">I am unable to make composer install work on Raspbery Pi zero, I
                                have had to zip the vendor folder from the source and transfer/unzip it on the
                                Pi.</p>
                            <p>with the package.json file ready we can do composer install to add the vendor folder
                                and install any package dependencies.</p>
                            <div class="code-container"><pre id="codeBlock">
                                composer create-project --prefer-dist laravel/laravel blog "5.5.*"</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <p>this will set the key in the .env file required to be unique to the particular
                                install of the website</p>
                            <div class="code-container"><pre id="codeBlock">
                                php artisan key:generate</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <p>- from the project directory go into .env and check database login</p>
                            <div class="code-container"><pre id="codeBlock">
                                sudo nano .env</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <p>- add database to phpmyadmin logging into phpmyadmin in a browser at the
                                ipaddress/phpmyadmin</p>
                            <p>change group ownership of the public folders that need to be accessable to view the
                                website</p>
                            <div class="code-container"><pre id="codeBlock">
                                sudo chgrp -R www-data /var/www/html/<i style="color:orange">project</i>/storage</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <div class="code-container"><pre id="codeBlock">
                                sudo chgrp -R www-data /var/www/html/<i style="color:orange">project</i>/bootstrap/cache
                            </pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <p>-webpage will not load because logfile is inaccesable do next to fix -</p>
                            <p>-truncate (empty) /storage/framework/sessions and /storage/framework/views but make
                                sure the file directories are present.</p>
                            <div class="code-container"><pre id="codeBlock">
                                sudo chmod 755 -R /var/www/html/<i style="color:orange">project</i>/storage</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <p>On raspberry pi 755 is not enough and storage needs 777 permissions</p>
                            <div class="code-container"><pre id="codeBlock">
                                php artisan cache:clear</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
                            <div class="code-container"><pre id="codeBlock">
                                composer dumpautoload</pre>
                                <button onclick="copyToClipboard('#codeBlock')">Copy</button>
                            </div>
        </li>
    </ul>
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
        alert("Copied to clipboard");
    }
</script>
</body>
</html>
