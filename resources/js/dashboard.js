document.addEventListener('DOMContentLoaded', function () {

    /*
    =====================================
    1. SEARCH PENGAJUAN
    =====================================
    */

    const searchInput =
        document.getElementById('searchBarang');

    const table =
        document.getElementById('pengajuanTable');


    if (searchInput && table) {

        searchInput.addEventListener('input', function () {

            const keyword =
                this.value.toLowerCase();

            const rows =
                table.querySelectorAll('tbody tr');


            rows.forEach(function (row) {

                const text =
                    row.textContent.toLowerCase();

                if (text.includes(keyword)) {

                    row.style.display = '';

                } else {

                    row.style.display = 'none';

                }

            });

        });

    }


    /*
    =====================================
    2. BUTTON TAMBAH BARANG
    =====================================
    */

    const addButton =
        document.getElementById('addBarangButton');


    if (addButton) {

        addButton.addEventListener('click', function () {

            alert(
                'Halaman Tambah Barang akan dibuat oleh tim backend/frontend pada tahap CRUD.'
            );

        });

    }


    /*
    =====================================
    3. ANIMASI BAR CHART
    =====================================
    */

    const bars =
        document.querySelectorAll('.bar');


    bars.forEach(function (bar, index) {

        bar.style.opacity = '0';

        setTimeout(function () {

            bar.style.transition =
                '0.5s ease';

            bar.style.opacity = '1';

        }, index * 100);

    });

});
