@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        Manage Profile
    </h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4">
                Setting
            </h4>

            <ul>
                <li>
                    <a href="/user/profile/index" class="{{ request()->is('user/profile/index') ? 'text-pink-500' : '' }}">Profile</a>
                </li>
                <li>
                    <a href="/user/profile/posts" class="{{ request()->is('user/profile/posts') ? 'text-pink-500' : '' }}">My Posts</a>
                </li>

                <li>
                    <a  href="/user/profile/comments" class="{{ request()->is('user/profile/comments') ? 'text-pink-500' : '' }}">My Comments</a>
                </li>
            </ul>
        </aside>

        <main class="flex-1">
            <x-panel>

            </x-panel>
        </main>
    </div>
</section>
