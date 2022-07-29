export function ToggleUpdate(button, update_btn, account_input) {
  let is_update = false;

  button.addEventListener("click", () => {
    if (!is_update) {
      account_input.forEach((input) => {
        input.disabled = false;
      });
      update_btn.style.display = "block";
      button.innerText = "Huỷ";
      is_update = true;
    } else {
      account_input.forEach((input) => {
        input.disabled = true;
      });
      update_btn.style.display = "none";
      button.innerText = "Chỉnh sửa";
      is_update = false;
    }
  });
}
