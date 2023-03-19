<!-- elemen yang akan digunakan sebagai tempat filter kategori -->
<div x-data="{ category: 'all' }" x-on:click="category = $event.target.dataset.category">
    <!-- elemen-elemen yang akan digunakan sebagai pilihan kategori -->
    <button data-category="all">Semua</button>
    <button data-category="pakaian">Pakaian</button>
    <button data-category="aksesoris">Aksesoris</button>
    <button data-category="elektronik">Elektronik</button>
  </div>
  
  <!-- elemen yang akan digunakan sebagai tempat menampilkan hasil filter -->
  <div x-data="{ items: [ 'Kemeja', 'Ikat kepala', 'Laptop', 'Celana', 'Smartphone' ] }" x-bind:class="{ 'visible': $item === category || category === 'all' }" x-for="$item in items">
    <!-- elemen-elemen yang akan difilter -->
    <div x-bind:class="$item">{{ $item }}</div>
</div>