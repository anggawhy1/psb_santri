<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation" class="flex justify-center mt-8">
    <ul class="inline-flex -space-x-px text-sm shadow-sm">
        
        <li>
            <?php if ($pager->hasPrevious()) : ?>
                <a href="<?= $pager->getPrevious() ?>" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 transition">
                    <span class="sr-only">Previous</span>
                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                </a>
            <?php else : ?>
                <span class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-300 bg-gray-50 border border-e-0 border-gray-300 rounded-s-lg cursor-not-allowed">
                    <span class="sr-only">Previous</span>
                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                </span>
            <?php endif ?>
        </li>

        <?php foreach ($pager->links() as $link) : ?>
            <li>
                <a href="<?= $link['uri'] ?>" class="flex items-center justify-center px-3 h-8 leading-tight border border-gray-300 transition <?= $link['active'] ? 'z-10 text-emerald-600 border-emerald-300 bg-emerald-50 hover:bg-emerald-100 hover:text-emerald-700 font-bold' : 'text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700' ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <li>
            <?php if ($pager->hasNext()) : ?>
                <a href="<?= $pager->getNext() ?>" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 transition">
                    <span class="sr-only">Next</span>
                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                </a>
            <?php else : ?>
                <span class="flex items-center justify-center px-3 h-8 leading-tight text-gray-300 bg-gray-50 border border-gray-300 rounded-e-lg cursor-not-allowed">
                    <span class="sr-only">Next</span>
                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                </span>
            <?php endif ?>
        </li>
    </ul>
</nav>