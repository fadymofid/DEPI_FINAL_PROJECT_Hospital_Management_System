<x-action-section>
    <x-slot name="title">
        {{ __('usersHome.Browser Sessions') }} <!-- Translated: جلسات المتصفح -->
    </x-slot>

    <x-slot name="description">
        {{ __('usersHome.Manage and log out your active sessions on other browsers and devices.') }} <!-- Translated: إدارة وتسجيل الخروج من جلساتك النشطة على المتصفحات والأجهزة الأخرى. -->
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('usersHome.If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.') }} <!-- Translated: إذا لزم الأمر، يمكنك تسجيل الخروج من جميع جلسات المتصفح الأخرى على جميع أجهزتك. يتم سرد بعض جلساتك الأخيرة أدناه؛ ومع ذلك، قد لا تكون هذه القائمة شاملة. إذا شعرت أن حسابك قد تم اختراقه، يجب عليك أيضًا تحديث كلمة المرور الخاصة بك. -->
        </div>

        @if (count($this->sessions) > 0)
            <div class="mt-5 space-y-6">
                <!-- Other Browser Sessions -->
                @foreach ($this->sessions as $session)
                    <div class="flex items-center">
                        <div>
                            @if ($session->agent->isDesktop())
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                </svg>
                            @endif
                        </div>

                        <div class="ml-3">
                            <div class="text-sm text-gray-600">
                                {{ $session->agent->platform() ? $session->agent->platform() : __('usersHome.Unknown') }} - {{ $session->agent->browser() ? $session->agent->browser() : __('usersHome.Unknown') }} <!-- Translated: غير معروف -->
                            </div>

                            <div>
                                <div class="text-xs text-gray-500">
                                    {{ $session->ip_address }},

                                    @if ($session->is_current_device)
                                        <span class="text-green-500 font-semibold">{{ __('usersHome.This device') }}</span> <!-- Translated: هذا الجهاز -->
                                    @else
                                        {{ __('usersHome.Last active') }} {{ $session->last_active }} <!-- Translated: آخر نشاط -->
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="flex items-center mt-5">
            <x-button wire:click="confirmLogout" wire:loading.attr="disabled">
                {{ __('usersHome.Log Out Other Browser Sessions') }} <!-- Translated: تسجيل الخروج من جلسات المتصفح الأخرى -->
            </x-button>

            <x-action-message class="ml-3" on="loggedOut">
                {{ __('usersHome.Done.') }} <!-- Translated: تم. -->
            </x-action-message>
        </div>

        <!-- Log Out Other Devices Confirmation Modal -->
        <x-dialog-modal wire:model="confirmingLogout">
            <x-slot name="title">
                {{ __('usersHome.Log Out Other Browser Sessions') }} <!-- Translated: تسجيل الخروج من جلسات المتصفح الأخرى -->
            </x-slot>

            <x-slot name="content">
                {{ __('usersHome.Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.') }} <!-- Translated: يرجى إدخال كلمة المرور الخاصة بك لتأكيد أنك ترغب في تسجيل الخروج من جلسات المتصفح الأخرى عبر جميع أجهزتك. -->

                <div class="mt-4" x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password" class="mt-1 block w-3/4"
                             autocomplete="current-password"
                             placeholder="{{ __('usersHome.Password') }}"
                    x-ref="password"
                    wire:model.defer="password"
                    wire:keydown.enter="logoutOtherBrowserSessions" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">
                    {{ __('usersHome.Cancel') }} <!-- Translated: إلغاء -->
                </x-secondary-button>

                <x-button class="ml-3"
                          wire:click="logoutOtherBrowserSessions"
                          wire:loading.attr="disabled">
                    {{ __('usersHome.Log Out Other Browser Sessions') }} <!-- Translated: تسجيل الخروج من جلسات المتصفح الأخرى -->
                </x-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
