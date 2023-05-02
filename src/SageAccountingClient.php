<?php

namespace TagMyDoc\SageAccounting;

use Saloon\Helpers\OAuth2\OAuthConfig;
use Saloon\Http\Connector;
use Saloon\Traits\OAuth2\AuthorizationCodeGrant;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class SageAccountingClient extends Connector
{
    use AlwaysThrowOnErrors, AuthorizationCodeGrant;

    public function __construct(protected string $clientId, protected string $clientSecret, protected string $redirectUri, protected array $scopes = [])
    {
    }

    public function resolveBaseUrl(): string
    {
        return 'https://api.accounting.sage.com/v3.1';
    }

    protected function defaultOauthConfig(): OAuthConfig
    {
        return OAuthConfig::make()
            ->setClientId($this->clientId)
            ->setClientSecret($this->clientSecret)
            ->setDefaultScopes($this->scopes)
            ->setRedirectUri($this->redirectUri)
            ->setTokenEndpoint('https://oauth.accounting.sage.com/token')
            ->setUserEndpoint('/user')
            ->setAuthorizeEndpoint('https://www.sageone.com/oauth2/auth/central');
    }
}