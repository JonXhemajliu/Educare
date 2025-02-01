
// CLOSING BUTTON
function closeMessage() {
  let messageBox = document.getElementById("messageBox");
  if (messageBox) {
    messageBox.style.display = "none"; // Hide the message
  }
}

// Close modal if user clicks outside of it
window.onclick = function (event) {
  var modal = document.getElementById("addTeacherModal");
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

// Function to add a new teacher to the table
function addTeacherToTable(name, subject) {
  const tableBody = document.getElementById("teacherTableBody");
  const newRow = document.createElement("tr");

  newRow.innerHTML = `
      <td>${name}</td>
      <td>${subject}</td>
      <td>
          <button class="btn btn-edit" onclick="editTeacher(this)">Edit</button>
          <button class="btn btn-delete" onclick="deleteTeacher(this)">Delete</button>
      </td>
  `;

  tableBody.appendChild(newRow);
}

// Example function to delete a teacher
function deleteTeacher(button) {
  const row = button.closest("tr");
  row.remove();
  alert("Teacher deleted successfully!");
}

// Function to open the Add Teacher modal
function openAddModal() {
  document.getElementById("addTeacherModal").style.display = "block";
}

// Function to close the Add Teacher modal
function closeAddModal() {
  document.getElementById("addTeacherModal").style.display = "none";
}

// Function to close the message box
function closeMessage() {
  document.getElementById("messageBox").style.display = "none";
}
// Function to open the Edit Teacher modal
function openEditModal(id, name, subject) {
  document.getElementById("edit_teacher_id").value = id;
  document.getElementById("edit_name").value = name;
  document.getElementById("edit_subject").value = subject;
  document.getElementById("editTeacherModal").style.display = "block";
}

// Function to close the Edit Teacher modal
function closeEditModal() {
  document.getElementById("editTeacherModal").style.display = "none";
}
