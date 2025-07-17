<form
    class="mx-auto flex flex-col gap-4 mt-12 px-6 sm:px-10 pb-8 bg-background-secondary/80 rounded-lg xl:max-w-md w-full border border-neutral"
    wire:submit="submit" id="login">
    <div class="flex flex-col items-center mt-4 mb-8">
        <x-logo class="mb-2" />
        <h1 class="text-2xl text-center font-bold tracking-tight">{{ __('auth.sign_in_title') }}</h1>
    </div>
    <div class="flex flex-col gap-2">
        <x-form.input name="email" type="email" :label="__('general.input.email')"
            :placeholder="__('general.input.email_placeholder')" wire:model="email" hideRequiredIndicator required icon="ri-mail-line" />
        <x-form.input name="password" type="password" :label="__('general.input.password')"
            :placeholder="__('general.input.password_placeholder')" required hideRequiredIndicator wire:model="password" icon="ri-lock-2-line" />
    </div>
    <div class="flex flex-row items-center mt-2">
        <x-form.checkbox name="remember" label="Remember me" wire:model="remember" />
        <a class="text-sm text-muted ml-auto hover:underline" href="{{ route('password.request') }}">
            {{ __('auth.forgot_password') }}
        </a>
    </div>
    <x-captcha :form="'login'" class="mt-2" />
    <x-button.primary class="w-full mt-4 py-2 text-base font-semibold tracking-wide" type="submit">{{ __('auth.sign_in') }}</x-button.primary>
    @if (config('settings.oauth_github') || config('settings.oauth_google') || config('settings.oauth_discord'))
    <div class="flex flex-col items-center mt-4">
        <div class="my-5 flex items-center w-full">
            <span aria-hidden="true" class="h-0.5 grow rounded bg-neutral"></span>
            <span class="rounded-full px-3 py-1 text-xs font-medium bg-neutral text-base">
                {{ __('auth.or_sign_in_with') }}
            </span>
            <span aria-hidden="true" class="h-0.5 grow rounded bg-neutral"></span>
        </div>
        <div class="flex flex-row flex-wrap justify-center mt-2 gap-4">
            @foreach (['github', 'google', 'discord'] as $provider)
            @if (config('settings.oauth_' . $provider))
            <a href="{{ route('oauth.redirect', $provider) }}"
                class="flex items-center justify-center px-4 h-10 border border-neutral rounded-md text-base">
                <img src="/assets/images/{{ $provider }}-dark.svg" alt="{{ $provider }}"
                    class="size-5 mr-2 text-secondary">
                {{ __(ucfirst($provider)) }}
            </a>
            @endif
            @endforeach
        </div>
    </div>
    @endif
    @if(!config('settings.registration_disabled', false))
    <div class="text-center rounded-md py-2 mt-6 text-sm text-muted">
        {{ __('auth.dont_have_account') }}
        <a class="text-sm text-primary hover:underline ml-1" href="{{ route('register') }}" wire:navigate>
            {{ __('auth.sign_up') }}
        </a>
    </div>
    @endif
</form>