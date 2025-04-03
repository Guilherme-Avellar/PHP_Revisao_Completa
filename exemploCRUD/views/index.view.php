<form class="w-full flex space-x-2 mt-6">
    <input type="text"
        class="border-stone-800 bg-stone-900 text-sm border-2 rounded-md focus:outline-none py-1 px-2"
        placeholder="Pesquisar..." />
    <button type="submit">🔎</button>
</form>

<!-- lista de Livros -->
<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

    <!-- Livros -->

    <?php foreach ($livros as $livro): ?>

        <div class="p-2 rounded border-stone-800 border-2 bg-stone-900">
            <div class="flex">
                <div class="w-1/3">imagem</div>

                <div class="space-y-1">
                    <a href="/livro?id=<?= $livro["id"] ?>" class="font-semibold hover:underline"><?= $livro["titulo"] ?></a>
                    <div class="text-xs italic"><?= $livro["autor"] ?></div>
                    <div class="text-xs italic">⭐⭐⭐⭐⭐(3 Avaliações)</div>
                </div>

            </div>

            <div class="text-sm mt-2">
                <?= $livro["descricao"] ?>
            </div>
        </div>

    <?php endforeach; ?>

</section>