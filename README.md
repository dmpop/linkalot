# Linkalot

A crude link list tool written in PHP. Works best with the following bookmarklet. Replace _SECRET_ with the actual value of the `key` variable in _config.php_. Replace _127.0.0.1_ with the actual IP address or domain name of the server running Linkalot.


```javascript
javascript:var text=prompt("Description",""); location.href='https://127.0.0.1/linkalot/?url='+encodeURIComponent(location.href)+'&key=SECRET&txt='+escape(text)

```

 Author

[Dmitri Popov](https://www.tokyomade.photography/)

# License

The [GNU General Public License version 3](http://www.gnu.org/licenses/gpl-3.0.en.html)
