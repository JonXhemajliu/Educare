// CLOSING BUTTON
function closeMessage() {
  let messageBox = document.getElementById("messageBox");
  if (messageBox) {
    messageBox.style.display = "none"; // Hide the message
  }
}

// Close modal if user clicks outside of it
window.onclick = function (event) {
  var addModal = document.getElementById("addActivityModal");
  var editModal = document.getElementById("editActivityModal");
  if (event.target == addModal) {
    addModal.style.display = "none";
  }
  if (event.target == editModal) {
    editModal.style.display = "none";
  }
};

// Function to add a new activity to the table
function addActivityToTable(name, imageUrl) {
  const tableBody = document.getElementById("activityTableBody");
  const newRow = document.createElement("tr");

  newRow.innerHTML = `
        <td>${name}</td>
        <td><img src="${imageUrl}" alt="${name}" style="width: 50px; height: 50px;"></td>
        <td>
            <button class="btn btn-edit" onclick="editActivity(this)">Edit</button>
            <button class="btn btn-delete" onclick="deleteActivity(this)">Delete</button>
        </td>
    `;

  tableBody.appendChild(newRow);
}

// Example function to delete an activity
function deleteActivity(button) {
  const row = button.closest("tr");
  row.remove();
  alert("Activity deleted successfully!");
}

// Function to open the Add Activity modal
function openAddModal() {
  document.getElementById("addActivityModal").style.display = "block";
}

// Function to close the Add Activity modal
function closeAddModal() {
  document.getElementById("addActivityModal").style.display = "none";
}

// Function to open the Edit Activity modal
function openEditModal(id, name) {
  document.getElementById("edit_activity_id").value = id;
  document.getElementById("edit_name").value = name;
  document.getElementById("editActivityModal").style.display = "block";
}

// Function to close the Edit Activity modal
function closeEditModal() {
  document.getElementById("editActivityModal").style.display = "none";
}

// Function to handle form submission for adding an activity
document
  .getElementById("addActivityForm")
  ?.addEventListener("submit", function (event) {
    event.preventDefault();

    const activityName = document.getElementById("name").value;
    const activityImage = document.getElementById("image").files[0];

    if (activityName && activityImage) {
      const reader = new FileReader();
      reader.onload = function (e) {
        const imageUrl = e.target.result;
        addActivityToTable(activityName, imageUrl);
        closeAddModal();
        alert("Activity added successfully!");
      };
      reader.readAsDataURL(activityImage);
    } else {
      alert("Please fill in all fields.");
    }
  });

// Function to handle form submission for editing an activity
document
  .getElementById("editActivityForm")
  ?.addEventListener("submit", function (event) {
    event.preventDefault();

    const activityId = document.getElementById("edit_activity_id").value;
    const activityName = document.getElementById("edit_name").value;
    const activityImage = document.getElementById("edit_image").files[0];

    if (activityName) {
      if (activityImage) {
        const reader = new FileReader();
        reader.onload = function (e) {
          const imageUrl = e.target.result;
          updateActivityInTable(activityId, activityName, imageUrl);
          closeEditModal();
          alert("Activity updated successfully!");
        };
        reader.readAsDataURL(activityImage);
      } else {
        updateActivityInTable(activityId, activityName);
        closeEditModal();
        alert("Activity updated successfully!");
      }
    } else {
      alert("Please fill in all fields.");
    }
  });

// Function to update an activity in the table
function updateActivityInTable(id, name, imageUrl = null) {
  const tableBody = document.getElementById("activityTableBody");
  const rows = tableBody.getElementsByTagName("tr");

  for (let row of rows) {
    const rowId = row.querySelector("input[name='activity_id']")?.value;
    if (rowId == id) {
      row.querySelector("td:nth-child(1)").textContent = name;
      if (imageUrl) {
        row.querySelector("td:nth-child(2) img").src = imageUrl;
      }
      break;
    }
  }    

}
