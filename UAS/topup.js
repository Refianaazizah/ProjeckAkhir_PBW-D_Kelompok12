document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("topupForm");
  const amountInput = document.getElementById("amount");

  form.addEventListener("submit", function (e) {
    const amount = parseFloat(amountInput.value);

    if (isNaN(amount) || amount < 1000) {
      e.preventDefault();
      alert("Minimal top up adalah Rp 1.000!");
    }
  });
});
