# Linkalot

Linkalot is a web-based inbox for your links. Linkalot runs on any machine or web server with PHP.

## Dependencies

- PHP
- Web server (Apache, Lighttpd, or similar)
- Git (optional)


## Installation and Usage

1. Install the required packages on a local machine or remote web server.
2. Clone the project's repository using the `git clone https://gitlab.com/dmpop/linkalot.git` command. Alternatively, download the latest source code using the appropriate button on the project's pages.
3. Open the _linkalot/config.php_ file and change example values of the `key` and `passwd` variables. Save the changes.

To run Lilut locally, switch in the terminal to the _linkalot_ directory,  run the `php -S 127.0.0.1:8000` command, and point the browser to the _127.0.0.1:8000_ address.

To install Linkalot on a web server with PHP, copy the _linkalot_ directory to the document root of your server.

Linkalot works best with the following bookmarklet. Replace _SECRET_ with the actual value of the `key` variable in _config.php_. Replace _127.0.0.1_ with the actual IP address or domain name of the server running Linkalot.


```javascript
javascript:var text=prompt("Description",""); location.href='https://127.0.0.1/linkalot/?url='+encodeURIComponent(location.href)+'&key=SECRET&txt='+escape(text)

```

## Problems?

Please report bugs and issues in the [Issues](https://gitlab.com/dmpop/linkalot/issues) section.

## Contribute

If you've found a bug or have a suggestion for improvement, open an issue in the [Issues](https://gitlab.com/dmpop/linkalot/issues) section.

To add a new feature or fix issues yourself, follow the following steps.

1. Fork the project's repository
2. Create a feature branch using the `git checkout -b new-feature` command
3. Add your new feature or fix bugs and run the `git commit -am 'Add a new feature'` command to commit changes
4. Push changes using the `git push origin new-feature` command
5. Submit a merge request

## Author

[Dmitri Popov](https://www.tokyomade.photography/)

# License

The [GNU General Public License version 3](http://www.gnu.org/licenses/gpl-3.0.en.html)
