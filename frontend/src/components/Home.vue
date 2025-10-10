<template>
    <div class="h-screen flex bg-zinc-50 text-zinc-900 dark:bg-zinc-900 dark:text-zinc-100">
        <!-- Mobile off-canvas: Headless UI Dialog + Transitions -->
        <TransitionRoot as="template" :show="mobileOpen">
            <Dialog as="div" class="relative z-40 md:hidden" @close="mobileOpen = false">
                <!-- Overlay -->
                <TransitionChild
                    as="template"
                    enter="transition-opacity ease-linear duration-200"
                    enter-from="opacity-0"
                    enter-to="opacity-100"
                    leave="transition-opacity ease-linear duration-200"
                    leave-from="opacity-100"
                    leave-to="opacity-0"
                >
                    <div class="fixed inset-0 bg-black/40 backdrop-blur-[1px]" />
                </TransitionChild>

                <div class="fixed inset-0 flex">
                    <!-- Sliding panel -->
                    <TransitionChild
                        as="template"
                        enter="transition ease-out duration-200"
                        enter-from="-translate-x-full opacity-0"
                        enter-to="translate-x-0 opacity-100"
                        leave="transition ease-in duration-200"
                        leave-from="translate-x-0 opacity-100"
                        leave-to="-translate-x-full opacity-0"
                    >
                        <DialogPanel class="relative mr-16 flex w-72 max-w-full flex-1">
                            <aside
                                class="thin-scroll h-screen w-72 overflow-y-auto bg-white/90 dark:bg-zinc-800/90 backdrop-blur border-r border-zinc-200 dark:border-zinc-700 shadow-xl"
                                aria-label="Mobile sidebar navigation"
                            >
                                <!-- Header -->
                                <div class="flex items-center gap-3 px-4 h-16">
                                    <button
                                        class="inline-flex items-center justify-center h-9 w-9 rounded-xl border border-zinc-200 dark:border-zinc-700 hover:bg-zinc-100 dark:hover:bg-zinc-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        @click="mobileOpen = false"
                                        aria-label="Close menu"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                    <div class="font-semibold text-lg tracking-tight select-none">Chat Admin</div>
                                </div>

                                <!-- Nav (mobile) -->
                                <nav class="px-2 py-2">
                                    <ul class="space-y-1">
                                        <li>
                                            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-zinc-100 dark:hover:bg-zinc-700/60 aria-[current=true]:bg-zinc-100 dark:aria-[current=true]:bg-zinc-700/60" aria-current="true">
                        <span class="inline-flex h-6 w-6 items-center justify-center">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M3 10.5 12 3l9 7.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5 10v10h14V10" stroke-linecap="round"/>
                          </svg>
                        </span>
                                                <span class="truncate">Home</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-zinc-100 dark:hover:bg-zinc-700/60">
                        <span class="inline-flex h-6 w-6 items-center justify-center">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M21 12a8.5 8.5 0 0 1-8.5 8.5H12a8.5 8.5 0 1 1 0-17h.5A8.5 8.5 0 0 1 21 12Z"/>
                            <path d="M8 12h8M8 16h5" stroke-linecap="round"/>
                          </svg>
                        </span>
                                                <span class="truncate">Messages</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-zinc-100 dark:hover:bg-zinc-700/60">
                        <span class="inline-flex h-6 w-6 items-center justify-center">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M16 11a4 4 0 1 0-8 0M3 21a7 7 0 0 1 18 0" stroke-linecap="round"/>
                          </svg>
                        </span>
                                                <span class="truncate">Teams</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-zinc-100 dark:hover:bg-zinc-700/60">
                        <span class="inline-flex h-6 w-6 items-center justify-center">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M12 15.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z"/>
                            <path d="M19.4 15a1.7 1.7 0 0 0 .34 1.87l.05.05a2 2 0 1 1-2.83 2.83l-.05-.05A1.7 1.7 0 0 0 15 19.4a1.7 1.7 0 0 0-1 .6 1.7 1.7 0 0 0-.4 1v.14a2 2 0 1 1-4 0v-.14a1.7 1.7 0 0 0-.4-1 1.7 1.7 0 0 0-1-.6 1.7 1.7 0 0 0-1.87-.34l-.05.05a2 2 0 1 1-2.83-2.83l.05-.05A1.7 1.7 0 0 0 4.6 15 1.7 1.7 0 0 0 4 14a1.7 1.7 0 0 0-1-.4H2.86a2 2 0 1 1 0-4H3a1.7 1.7 0 0 0 1-.4 1.7 1.7 0 0 0 .6-1 1.7 1.7 0 0 0 .34-1.87l-.05-.05a2 2 0 1 1 2.83-2.83l.05.05A1.7 1.7 0 0 0 9 4.6 1.7 1.7 0 0 0 10 4h.14a2 2 0 1 1 4 0H14a1.7 1.7 0 0 0 1 .6 1.7 1.7 0 0 0 1 .4 1.7 1.7 0 0 0 1.87.34l.05-.05a2 2 0 1 1 2.83 2.83l-.05.05A1.7 1.7 0 0 0 19.4 9c.26.54.6 1 .6 1.6v.14a2 2 0 1 1 0 4V15Z"/>
                          </svg>
                        </span>
                                                <span class="truncate">Settings</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </aside>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </Dialog>
        </TransitionRoot>

        <!-- Desktop sidebar -->
        <aside
            id="sidebar"
            :data-collapsed="collapsed"
            class="group hidden md:block sticky top-0 left-0 z-30 h-screen overflow-y-auto thin-scroll bg-white/80 dark:bg-zinc-800/80 backdrop-blur supports-[backdrop-filter]:bg-white/60 border-r border-zinc-200 dark:border-zinc-700 transition-all duration-300 ease-out md:w-64 data-[collapsed=true]:md:w-20"
            aria-label="Sidebar navigation"
        >
            <!-- Header -->
            <div class="flex items-center gap-3 px-4 h-16">
                <button
                    :aria-expanded="(!collapsed).toString()"
                    aria-controls="sidebar"
                    @click="toggleDesktop()"
                    class="inline-flex items-center justify-center h-9 w-9 rounded-xl border border-zinc-200 dark:border-zinc-700 hover:bg-zinc-100 dark:hover:bg-zinc-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    title="Toggle sidebar (⌘/Ctrl+B)"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <div class="font-semibold text-lg tracking-tight select-none group-data-[collapsed=true]:hidden md:block">
                    Chat Admin
                </div>
            </div>

            <!-- Nav (desktop) -->
            <nav class="px-2 py-2">
                <ul class="space-y-1">
                    <li>
                        <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-zinc-100 dark:hover:bg-zinc-700/60 aria-[current=true]:bg-zinc-100 dark:aria-[current=true]:bg-zinc-700/60" aria-current="true">
              <span class="inline-flex h-6 w-6 items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                  <path d="M3 10.5 12 3l9 7.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M5 10v10h14V10" stroke-linecap="round"/>
                </svg>
              </span>
                            <span class="truncate group-data-[collapsed=true]:hidden md:inline">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-zinc-100 dark:hover:bg-zinc-700/60">
              <span class="inline-flex h-6 w-6 items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                  <path d="M21 12a8.5 8.5 0 0 1-8.5 8.5H12a8.5 8.5 0 1 1 0-17h.5A8.5 8.5 0 0 1 21 12Z"/>
                  <path d="M8 12h8M8 16h5" stroke-linecap="round"/>
                </svg>
              </span>
                            <span class="truncate group-data-[collapsed=true]:hidden md:inline">Messages</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-zinc-100 dark:hover:bg-zinc-700/60">
              <span class="inline-flex h-6 w-6 items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                  <path d="M16 11a4 4 0 1 0-8 0M3 21a7 7 0 0 1 18 0" stroke-linecap="round"/>
                </svg>
              </span>
                            <span class="truncate group-data-[collapsed=true]:hidden md:inline">Teams</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-zinc-100 dark:hover:bg-zinc-700/60">
              <span class="inline-flex h-6 w-6 items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                  <path d="M12 15.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z"/>
                  <path d="M19.4 15a1.7 1.7 0 0 0 .34 1.87l.05.05a2 2 0 1 1-2.83 2.83l-.05-.05A1.7 1.7 0 0 0 15 19.4a1.7 1.7 0 0 0-1 .6 1.7 1.7 0 0 0-.4 1v.14a2 2 0 1 1-4 0v-.14a1.7 1.7 0 0 0-.4-1 1.7 1.7 0 0 0-1-.6 1.7 1.7 0 0 0-1.87-.34l-.05.05a2 2 0 1 1-2.83-2.83l.05-.05A1.7 1.7 0 0 0 4.6 15 1.7 1.7 0 0 0 4 14a1.7 1.7 0 0 0-1-.4H2.86a2 2 0 1 1 0-4H3a1.7 1.7 0 0 0 1-.4 1.7 1.7 0 0 0 .6-1 1.7 1.7 0 0 0 .34-1.87l-.05-.05a2 2 0 1 1 2.83-2.83l.05.05A1.7 1.7 0 0 0 9 4.6 1.7 1.7 0 0 0 10 4h.14a2 2 0 1 1 4 0H14a1.7 1.7 0 0 0 1 .6 1.7 1.7 0 0 0 1 .4 1.7 1.7 0 0 0 1.87.34l.05-.05a2 2 0 1 1 2.83 2.83l-.05.05A1.7 1.7 0 0 0 19.4 9c.26.54.6 1 .6 1.6v.14a2 2 0 1 1 0 4V15Z"/>
                </svg>
              </span>
                            <span class="truncate group-data-[collapsed=true]:hidden md:inline">Settings</span>
                        </a>
                    </li>
                </ul>

                <div class="my-4 h-px bg-zinc-200 dark:bg-zinc-700 group-data-[collapsed=true]:mx-3" />
                <div class="px-3 py-2 text-xs text-zinc-500 dark:text-zinc-400 hidden group-data-[collapsed=true]:md:block">
                    Collapsed
                </div>
            </nav>
        </aside>

        <!-- Main content -->
        <main :class="['flex-1 md:transition-[margin] duration-300 ease-out', collapsed ? 'md:ml-20' : 'md:ml-64']">
            <!-- Top bar -->
            <header class="sticky top-0 z-20 h-16 bg-white/80 dark:bg-zinc-900/80 backdrop-blur border-b border-zinc-200 dark:border-zinc-800 flex items-center px-4 md:px-6">
                <!-- Mobile hamburger -->
                <button
                    class="md:hidden inline-flex items-center justify-center h-9 w-9 rounded-xl border border-zinc-200 dark:border-zinc-700 hover:bg-zinc-100 dark:hover:bg-zinc-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    aria-controls="sidebar"
                    :aria-expanded="mobileOpen.toString()"
                    @click="mobileOpen = true"
                    title="Open menu"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h10"/>
                    </svg>
                </button>

                <h1 class="ml-2 md:ml-0 text-lg font-semibold tracking-tight">Dashboard</h1>
                <div class="ml-auto flex items-center gap-2">
                    <button
                        @click="$emit('logout')"
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition duration-200"
                    >
                        Logout
                    </button>
                </div>
            </header>

            <!-- Content -->
            <section class="px-4 md:px-6 py-6 space-y-6">
                <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                    <article class="rounded-2xl border border-zinc-200 dark:border-zinc-800 p-5 bg-white dark:bg-zinc-900 shadow-sm">
                        <h2 class="font-semibold mb-2">Welcome</h2>
                        <p class="text-sm text-zinc-600 dark:text-zinc-400">Try collapsing the sidebar with the top-left button or press <kbd>Ctrl/Cmd + B</kbd>.</p>
                    </article>
                    <article class="rounded-2xl border border-zinc-200 dark:border-zinc-800 p-5 bg-white dark:bg-zinc-900 shadow-sm">
                        <h2 class="font-semibold mb-2">Responsive</h2>
                        <p class="text-sm text-zinc-600 dark:text-zinc-400">On mobile, the sidebar slides in with an overlay. Press <kbd>Esc</kbd> to close.</p>
                    </article>
                    <article class="rounded-2xl border border-zinc-200 dark:border-zinc-800 p-5 bg-white dark:bg-zinc-900 shadow-sm">
                        <h2 class="font-semibold mb-2">Persisted</h2>
                        <p class="text-sm text-zinc-600 dark:text-zinc-400">Collapse state is saved in <code>localStorage</code>.</p>
                    </article>
                </div>
            </section>
        </main>
    </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'
import { Dialog, DialogPanel, TransitionChild, TransitionRoot } from '@headlessui/vue'

const collapsed = ref(false)
const mobileOpen = ref(false)
const md = 768 // Tailwind 'md'

const user = defineProps(['user'])

function applyCollapsed(v) {
    collapsed.value = v
    try { localStorage.setItem('sidebar:collapsed', v ? '1' : '0') } catch {}
}

function toggleDesktop() {
    if (window.innerWidth >= md) {
        applyCollapsed(!collapsed.value)
    } else {
        mobileOpen.value = !mobileOpen.value
    }
}

function onKeydown(e) {
    const mod = e.ctrlKey || e.metaKey
    if (mod && e.key.toLowerCase() === 'b' && window.innerWidth >= md) {
        e.preventDefault()
        applyCollapsed(!collapsed.value)
    }
    if (e.key === 'Escape' && window.innerWidth < md) {
        mobileOpen.value = false
    }
}

onMounted(() => {
    try { collapsed.value = localStorage.getItem('sidebar:collapsed') === '1' } catch {}
    window.addEventListener('keydown', onKeydown)
    window.addEventListener('resize', () => { if (window.innerWidth >= md) mobileOpen.value = false })
})

onBeforeUnmount(() => {
    window.removeEventListener('keydown', onKeydown)
})
</script>

<style scoped>
.thin-scroll::-webkit-scrollbar { width: 8px; }
.thin-scroll::-webkit-scrollbar-thumb { border-radius: 9999px; }
</style>
