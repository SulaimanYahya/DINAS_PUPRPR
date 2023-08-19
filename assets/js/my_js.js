function hanya_angka(evt) {
	var charCode = evt.which ? evt.which : event.keyCode;

	// Check if the pressed key is a number (0-9) or a space (key code 32)
	if (charCode !== 32 && (charCode < 48 || charCode > 57)) {
		// Prevent the default behavior of the input
		evt.preventDefault();
		return false;
	}

	return true;
}

// Fungsi untuk memformat angka otomatis saat pengguna mengetik
function formatAngka(input) {
	const value = input.value.replace(/\D/g, "");
	input.value = formatNumber(value);
}

// Fungsi untuk memformat angka dengan menggunakan fungsi toLocaleString()
function formatNumber(number) {
	return Number(number).toLocaleString("en");
}
