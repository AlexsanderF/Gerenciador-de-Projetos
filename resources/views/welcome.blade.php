<x-layout titulo="Página Inicial"/>

<div class="flex items-center justify-center gap-4 mt-20">
    <a
        class="inline-flex w-[300px] flex-col items-center justify-center rounded-lg bg-[#0070f3] p-6 text-white shadow-lg transition-colors hover:bg-[#0061d1] focus:outline-none focus:ring-2 focus:ring-[#0070f3] focus:ring-offset-2 dark:bg-[#0070f3] dark:hover:bg-[#0061d1] dark:focus:ring-[#0070f3]"
        href="{{ route('clientes.index') }}"
        rel="ugc"
    >
        <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="mb-4 h-12 w-12"
        >
            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
        </svg>
        <span class="text-xl font-medium">Clientes</span>
    </a>
    <a
            class="inline-flex w-[300px] flex-col items-center justify-center rounded-lg bg-[#34c759] p-6 text-white shadow-lg transition-colors hover:bg-[#2ea64a] focus:outline-none focus:ring-2 focus:ring-[#34c759] focus:ring-offset-2 dark:bg-[#34c759] dark:hover:bg-[#2ea64a] dark:focus:ring-[#34c759]"
            href="{{ route('funcionarios.index') }}"
            rel="ugc"
    >
        <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="mb-4 h-12 w-12"
        >
            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
        </svg>
        <span class="text-xl font-medium">Funcionários</span>
    </a>
    <a
            class="inline-flex w-[300px] flex-col items-center justify-center rounded-lg bg-[#ff9500] p-6 text-white shadow-lg transition-colors hover:bg-[#e68600] focus:outline-none focus:ring-2 focus:ring-[#ff9500] focus:ring-offset-2 dark:bg-[#ff9500] dark:hover:bg-[#e68600] dark:focus:ring-[#ff9500]"
            href="{{ route('projetos.index') }}"
        rel="ugc"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="mb-4 h-12 w-12"
        >
            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
        </svg>
        <span class="text-xl font-medium">Projetos</span>
    </a>
</div>
