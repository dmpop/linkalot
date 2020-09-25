# Linkalot

Linkalot is a web-based inbox for your links. Linkalot runs on any machine or web server with PHP. Linkalot's highlights:

- Instantly save links in a link list using the accompanying bookmarklet.
- Add a short description and tags to a link. The description appears as a pop-up when hovering the mouse of the link.
- All links are saved in a plain text file.
- Filter links by tag.
- Password-protected editing area for managing the saved links.

<a href="https://i.imgur.com/DowcGPR.png"><img src="https://i.imgur.com/DowcGPR.png" alt="" width="600"/></a>

## Dependencies

- PHP
- Web server (Apache, Lighttpd, or similar)
- Git (optional)

## Installation and Usage

1. Make sure that your local machine or remote web server has PHP installed.
2. Clone the project's repository using the `git clone https://gitlab.com/dmpop/linkalot.git` command. Alternatively, download the latest source code using the appropriate button on the project's page.
3. Open the _linkalot/config.php_ file and change example values of the `key` and `passwd` variables.


Add the bookmarklet below to the **Bookmarks** toolbar of your browser. (Replace _SECRET_ with the actual value of the `key` variable in _config.php_. Replace _127.0.0.1_ with the actual IP address or domain name of the server running Linkalot.)

```javascript
javascript:var%20text=prompt("Description","");location.href='https://127.0.0.1/linkalot/?url='+encodeURIComponent(location.href)+'&key=SECRET&txt='+escape(text)

```

If you want the bookmarklet to automatically extract description from the page, use the following bookmarklet (note that it doesn't work is the description is missing):

```javascript
javascript:var%20text=prompt("Description",document.querySelector('meta[name="description"]').content);location.href='https://127.0.0.1/linkalot/?url='+encodeURIComponent(location.href)+'&key=SECRET&txt='+escape(text)
```

And the following bookmarklet fetches the text selection in the current page and saves fhe link using the selected text as its description. The bookmarklet also allows you to add tags to the link.

```javascript
javascript:var%20text=window.getSelection();var%20tag=prompt("Tags:","");location.href='https://127.0.0.1/linkalot/?url='+encodeURIComponent(location.href)+'&key=SECRET&txt='+escape(text)+'&tag= '+escape(tag)
```

Linkalot also works with the [Send Tab URL](https://addons.mozilla.org/en-US/firefox/addon/send-tab-url/) add-on for Firefox. You can use this extension instead of the bookmarklet. In the add-on's **Preferences** section, add the following URL:

    https://127.0.0.1/linkalot/?url={URL}&txt={TITLE}&key=SECRET

Replace _SECRET_ with the actual value of the `key` variable in _config.php_. Replace _127.0.0.1_ with the actual IP address or domain name of the server running Linkalot.

To run Linkalot locally, switch in the terminal to the _linkalot_ directory,  run the `php -S 127.0.0.1:8000` command, and point the browser to the _127.0.0.1:8000_ address.

To install Linkalot on a web server with PHP, move the _linkalot_ directory to the document root of your server.

To bookmark the currently opened page, click the bookmarklet, provide a short description, and press **OK**. This adds the link to the linklist. Hover the mouse over the link to see the provided description. Use the **Edit** button to manage the saved links.

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
