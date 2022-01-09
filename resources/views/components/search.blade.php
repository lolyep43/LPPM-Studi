@push('css')
<style>
	.search-form {
		--searchButtonWidth: 75px;
		
		max-width: 320px;
		margin: 0 auto;
		overflow: hidden;
		position: relative;
		}

		.search-input {
			border: 1px #888 solid !important;
			margin: 0;
			padding: 0.5rem calc(var(--searchButtonWidth) + 0.5rem) 0.5rem 0.5rem;
			border-radius: 8px;
			width: 100%;
			background: #fff;
			-webkit-appearance: none;
			font-size: 13px;
			color: #000;
		}
		.search-input:focus {
		outline: 0;
		background: white;
		}
		.search-input:not(:placeholder-shown) ~ .search-button {
		transform: translateX(calc(-1 * var(--searchButtonWidth)));
		}

		.search-button {
		border: 0;
		padding: 0.5rem;
		border-radius: 8px;
		position: absolute; 
		top: 0;
		left: 100%;
		width: var(--searchButtonWidth);
		transition: 0.2s;
		background: #0A2D8B;
		color: white;
		font-size: 13px;
		height: 100%;
		}
		.search-button:focus {
		outline: 0;
		background: #222;
		}

		.screen-reader-text {
		position: absolute;
		top: -9999px;
		left: -9999px;
		}
</style>
@endpush
<div class="mb-30 p-30 card-view">
    <form class="search-form" method="GET" action="">
        <input name="c" id="search" type="search" class="search-input" placeholder="{{ $placeholder ?? '-' }}">
        <button class="search-button">Cari</button>
    </form>
</div>