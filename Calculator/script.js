function insert(num) {
    var textarea = document.form.textarea;
    var jumlah = textarea.value;
    var operator = ['+', '-', '*', '/', '00', '%', '.'];

    if (jumlah === '0' && operator.includes(num)) {
        if (jumlah === '0' && num === '.') {
            textarea.value = jumlah + num
        } else {
            return;
        }
    }
}