document.getElementById("checkout_diff_info_link").addEventListener("click", diffInfo);

function diffInfo() {
  document.getElementById('checkout_diff_info_link').style.display = 'none';
  document.getElementById('billing_info_col1').style.display = 'block';
  document.getElementById('billing_info_col2').style.display = 'block';
}
