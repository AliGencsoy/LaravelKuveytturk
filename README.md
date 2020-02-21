# LaravelKuveytturk
Laravel 5, 6 KuveytTürk Sanal Pos

## TODO
- Composer should require PHP XML and PHP CURL extensions
- throw new Exceptions.. instead of dd's
- Documentation
- Readme.md usage documentation
- Set status => securePayment, securePaymentResponse, paymentConfirmation and paymentConfirmationResponse
- Empty xml causes "Request rejected error"

## Yükleme

### 1. Adım
```console
composer require AliGencsoy/LaravelKuveytturk
```

### 2. Adım
```php
return [
    // ...

    'providers' => [
        // ...
        AliGencsoy\LaravelKuveytturk\KuveytturkServiceProvider::class
    ],

    // ...

    'aliases' => [
        // ...
        'Kuveytturk' => AliGencsoy\LaravelKuveytturk\KuveytturkFacade::class
    ],
);
```

## Kullanım

`routes/web.php`
```php
use Illuminate\Http\Request;

Route::get('/', function () {
    return Kuveytturk::setOkUrl(url('/') . '/ok')
        ->setFailUrl(url('/') . '/fail')
        ->securePayment();
});

Route::any('ok', function(Request $request) {
    $kuveytturk = Kuveytturk::parseResponse($request);
    if($kuveytturk->getError()) {
        dd('something-gone-wrong', $kuveytturk);
    }

    $kuveytturk->paymentConfirmation();
    if($kuveytturk->getError()) {
        dd('something-gone-wrong 2', $kuveytturk);
    }

    dd('ta da.. payment completed', $kuveytturk);
});

Route::any('fail', function(Request $request) {
    // dd('fail', $request->all());
    $kuveytturk = Kuveytturk::parseResponse($request->all());
    if($kuveytturk->getError()) {
        dd('something-gone-wrong', $kuveytturk);
    }
});
```
`.env` dosyasına herhangi bir bilgi girmediğimiz için paket KuveytTürk'ün sunduğu test ortamı bilgilerini ve benim girdiğim bilgileri kullanıyor.

### Production moduna geçmek için
`.env` dosyasında aşağıdaki bilgileri doldurmak gerekiyor.
```
LARAVEL_DEBUG=false
KUVEYTTURK_CUSTOMER_ID=
KUVEYTTURK_MERCHANT_ID=
KUVEYTTURK_USERNAME=
KUVEYTTURK_PASSWORD=
KUVEYTTURK_OK_URL=
KUVEYTTURK_FAIL_URL=
```