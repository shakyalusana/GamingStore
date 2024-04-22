let contacts_data;
let contacts_s_form = document.getElementById("contacts_s_form");

let feature_s_form = document.getElementById("feature_s_form");
// popup function
let popup = document.getElementById("popup");
let editpopup = document.getElementById("editpopup");
function openPopup() {
  popup.classList.add("open-popup");
}
function closePopup() {
  popup.classList.remove("open-popup");
}
function editOpenPopup() {
  editpopup.classList.add("open-popup");
}
function editClosePopup() {
  editpopup.classList.remove("open-popup");
}

window.onload = function () {
  get_all_features();
};

window.onload = function () {
  get_contact();
};

function get_contact() {
  let contacts_p_id = [
    "address",
    "pn1",
    "pn2",
    "email",
  ];

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/settings_crud.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    contacts_data = JSON.parse(this.responseText);
    contacts_data = Object.values(contacts_data);
    for (i = 0; i < contacts_p_id.length; i++) {
      document.getElementById(contacts_p_id[i]).innerHTML =
        contacts_data[i + 1];
    }

    iframe.src = contacts_data[9];

    contacts_inp(contacts_data);
  };

  xhr.send("get_contacts");
}

function contacts_inp(data) {
  let contacts_inp_id = [
    "address_inp",
    "pn1_inp",
    "pn2_inp",
    "email_inp",
  ];
  for (i = 0; i < contacts_inp_id.length; i++) {
    document.getElementById(contacts_inp_id[i]).value = data[i + 1];
  }
}

// contacts_s_form.addEventListener("submit", function (e) {
//   e.preventDefault();
//   upd_contacts();
// });

// function upd_contacts() {
//   let index = [
//     "address",
//     "gmap",
//     "pn1",
//     "pn2",
//     "email",
//     "fb",
//     "insta",
//     "linkedin",
//     "iframe",
//   ];
//   let contacts_inp_id = [
//     "address_inp",
//     "gmap_inp",
//     "pn1_inp",
//     "pn2_inp",
//     "email_inp",
//     "fb_inp",
//     "insta_inp",
//     "linkedin_inp",
//     "iframe_inp",
//   ];

//   let data_str = "";
//   for (i = 0; i < index.length; i++) {
//     data_str +=
//       index[i] + "=" + document.getElementById(contacts_inp_id[i]).value + "&";
//   }
//   data_str += "upd_contacts";

//   // console.log(data_str);
//   let xhr = new XMLHttpRequest();
//   xhr.open("POST", "ajax/settings_crud.php", true);
//   xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

//   xhr.onload = function () {
//     if (this.responseText == 1) {
//       console.log("success", "changed");
//       get_contact();
//     } else {
//       console.log("error", "no changes");
//     }
//   };

//   xhr.send(data_str);
// }

// feature_s_form.addEventListener("submit", function (e) {
//   e.preventDefault();
//   add_feature();
// });

function add_feature() {
  let data = new FormData();
  data.append("name", feature_s_form.elements["feature_name"].value);
  data.append("add_feature", "");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/features_facilities.php", true);

  xhr.onload = function () {
    if (this.responseText == 1) {
      console.log("Success");
      feature_s_form.elements["feature_name"].value = "";
      // get_members();
    } else {
      console.log("error");
    }
  };
  xhr.send(data);
}
// JavaScript function to remove a feature
function rem_member(val) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/features_facilities.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == 1) {
        // If deletion is successful, remove the feature from the frontend
        alert("Success", "Feature removed!");
        // You can also remove the feature from the frontend here if needed
      } else {
        // If deletion failed, show an error message
        alert("Error", "Failed to remove feature");
      }
    }
  };
  // Send feature ID as data to the server
  xhr.send("rem_member=" + val);
}
