# Instgram Auto-Like
Built by:   [sketch that](http://sketchthat.com)

## Requirements

- PHP 5.2.x or higher
- cURL
- Registered Instagram App

## Configuration

- Rename `includes/_config.php` to `includes/config.php`.
- Update the `$instagram` array with the relevent information, see [Instagram Developer](http://developers.instagram.com/).
- Update the `$tags` array with the tags you want to like.
- With your web browser hit index.php and login to Instagram.
- There is a limit of 30 request per hour enforced by Instagram.

### Thanks

Thanks to [Christian Metz](https://github.com/cosenary) for the [Instagram Class](https://github.com/cosenary/Instagram-PHP-API)