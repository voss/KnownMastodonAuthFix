 # KnownMastodon

Syndicate your posts to Mastodon instances

- Share Status, Articles, Images & Bookmarks
- Posts are automatically truncated to 500 characters to fit Mastodon limits (without appending permalinks, shortlinks, or ellipses to allow maximum characters).
- Handles content warnings : use || as separator between spoiler text and status. Text will be split there.
- A photo with #nsfw in title will set to sensitive and one has to click to see it in Mastodon.
- Supports fully automated OAuth callback flows without requiring manual out-of-band (OOB) code entry.
- Features self-healing OAuth registration: automatically resets and re-registers app credentials if they become stale or fail.

Admin page shows all Mastodon servers connected by the users.

- Multiple servers possible; something breaks at three (but who needs that much syndication?)
- Selective deletion of Mastodon accounts.
- Delete instance from server page.

Still on the Todo list:

- Localisation other than English

Installation: save and rename KnownMastodon to IdnoPlugins/Mastodon

Activate under Site Configurations—Plugins

Add an account under Account Settings–Mastodon (using the fully automated OAuth callback flow).

Credits: KnownMastodon is using the Mastodon class from https://github.com/TheCodingCompany/MastodonOAuthPHP, with local modifications to support fully automated redirect callbacks.
