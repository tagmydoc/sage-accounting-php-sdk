# [Sage Accounting](https://www.sage.com) PHP API

A beautiful, extendable API powered by [Saloon](https://github.com/sammyjo20/saloon).

## Installation

```bash
composer require tagmydoc/sage-accounting-sdk-php
```

## Usage

```php
$client = new SageAccountingClient('CLIENT_ID', 'CLIENT_SECRET', route('services/sage'), ['readonly']);
$authenticator = AccessTokenAuthenticator::unserialize(get('sage:token')); // The get function is simply a placeholder for you to get the stored access token from your storage

if ($authenticator->hasExpired()) {
    $authenticator = $client->refreshAccessToken($authenticator);
    // Save the new access token in your storage
    // The save function is simply a placeholder for you to save the access token to your storage
    save('sage:token', $authenticator->serialize());
}

$client->authenticate($authenticator);

$request = CreateContactRequest::make();
$request->body()->add('contact', [
  'name' => 'John Smith'
]);

$response = $client->send($request);

$contactId = $response->json('id');
```

## Credits

- [Alexandre Demers](https://github.com/alexdemers)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
