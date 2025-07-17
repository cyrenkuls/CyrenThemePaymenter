<form
    class="mx-auto flex flex-col gap-4 mt-12 px-6 sm:px-10 pb-8 bg-background-secondary/80 rounded-lg xl:max-w-2xl w-full border border-neutral"
    wire:submit.prevent="submit" id="register">
    <div class="flex flex-col items-center mt-4 mb-8">
        <x-logo class="mb-2" />
        <h1 class="text-2xl text-center font-bold tracking-tight">{{ __('auth.sign_up_title') }}</h1>
    </div>
    <div class="flex flex-col md:grid md:grid-cols-2 gap-4">
        <x-form.input name="first_name" type="text" :label="__('general.input.first_name')"
            :placeholder="__('general.input.first_name_placeholder')" wire:model="first_name" required icon="ri-user-line" />
        <x-form.input name="last_name" type="text" :label="__('general.input.last_name')"
            :placeholder="__('general.input.last_name_placeholder')" wire:model="last_name" required icon="ri-user-line" />
        <x-form.input name="email" type="email" :label="__('general.input.email')"
            :placeholder="__('general.input.email_placeholder')" required wire:model="email" divClass="col-span-2" icon="ri-mail-line" />
        <x-form.input name="password" type="password" :label="__('Password')" :placeholder="__('Your password')"
            wire:model="password" required icon="ri-lock-2-line" />
        <x-form.input name="password_confirm" type="password" :label="__('Password')"
            :placeholder="__('Confirm your password')" wire:model="password_confirmation" required icon="ri-lock-2-line" />
        <x-form.properties :custom_properties="$custom_properties" :properties="$properties" />
    </div>
    <x-captcha :form="'register'" class="mt-2" />
    <x-button.primary class="w-full mt-4 py-2 text-base font-semibold tracking-wide">{{ __('Sign up') }}</x-button.primary>
    <div class="text-center rounded-md py-2 mt-6 text-sm text-muted">
        {{ __('auth.already_have_account') }}
        <a class="text-sm text-primary hover:underline ml-1" href="{{ route('login') }}" wire:navigate>
            {{ __('auth.sign_in') }}
        </a>
    </div>
</form>