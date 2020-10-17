var updateMember = new Vue({
  el: '#updateMember',
  data: {
    members: {}
  },
  methods: {
    fetchMembers() {
      fetch('api/members/viewmembers.php')
      .then(response => response.json())
      .then(json => { memberInfo.members = json })
    },

    handleNewMemberForm() {
    fetch('api/members/updatemembers.php', {
      method:'POST',
      body: JSON.stringify(this.members),
      headers:{
        "Content-Type": "application/json; charset=utf-8"
      }
      })
      .then( response => response.text() )

      this.handleData();
    },

    handleData() {
      this.members = {
        fname: "",
        mname: "",
        lname: "",
        street: "",
        city: "",
        state: "",
        zip: "",
        phone: "",
        email: "",
        position: "",
        station: "",
        radio_num: ""
      }
    }
  },
  created() {
    this.handleData();
    this.fetchMembers();
  }
});

function success() {
  alert("Member added successfully, redirecting to view members page");
  window.location.href = "viewmembers.html";
}
