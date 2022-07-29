import { $, $$ } from "../utils/selector.js";
import { setTitle } from "../utils/setTitle.js";
import { ToggleUpdate } from "../utils/toggleUpdate.js";
//toggle acount info

const account_input = $$(".account-input");
const btn = $(".update-account-btn");
const update_btn = $(".update_btn");

// toggle password
const account_input_p = $$(".account-input-p");
const btn_p = $(".update-account-btn-p");
const update_btn_p = $(".update_btn-p");

ToggleUpdate(btn, update_btn, account_input);
ToggleUpdate(btn_p, update_btn_p, account_input_p);

async function Main() {
  setTitle("Tài khoản");
}

Main();
