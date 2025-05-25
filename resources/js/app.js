import "./bootstrap";

// Дополнительные скрипты для корзины
document.addEventListener("DOMContentLoaded", function () {
    // Логика для обновления количества товаров
    document.querySelectorAll(".update-quantity").forEach((button) => {
        button.addEventListener("click", function (e) {
            e.preventDefault();
        });
    });
});
