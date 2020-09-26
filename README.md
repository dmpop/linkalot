# Linkalot

Linkalot is a web-based inbox for your links. Linkalot runs on any machine or web server with PHP. Linkalot's highlights:

- Save links in a link list using the accompanying bookmarklet.
- Add a short description and tags to a link.
- All links are saved in a plain text file.
- Filter links by tags.
- Password-protection for adding and managing links.

<a href="https://i.imgur.com/AlToIZS.png"><img src="https://i.imgur.com/AlToIZS.png" alt="" width="600"/></a>

## Dependencies

- PHP
- Web server (Apache, Lighttpd, or similar)
- Git (optional)

## Installation and Usage

1. Make sure that your local machine or remote web server has PHP installed.
2. Clone the project's repository using the `git clone https://gitlab.com/dmpop/linkalot.git` command. Alternatively, download the latest source code using the appropriate button on the project's page.
3. Open the _linkalot/config.php_ file and modify the default settings.


Add the bookmarklet below to the **Bookmarks** toolbar of your browser. (Replace _127.0.0.1_ with the actual IP address or domain name of the server running Linkalot.)

```javascript
javascript:var%20text=window.getSelection();location.href='https://127.0.0.1/linkalot/add.php?url='+encodeURIComponent(location.href)+'&txt='+escape(text)
```

To run Linkalot locally, switch in the terminal to the _linkalot_ directory,  run the `php -S 127.0.0.1:8000` command, and point the browser to the _127.0.0.1:8000_ address.

To install Linkalot on a web server with PHP, move the _linkalot_ directory to the document root of your server.

To bookmark the currently opened page, select a text that describes the link (for example, an article title), and click the bookmarklet. In the Linkalot form, fill out the available fields and press **Save**. This adds the link to the link list. To add a link manually, press the **Add link**, button, fill out the required fields, and press **Save**. Use the **Edit** button to manage the saved links.

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
