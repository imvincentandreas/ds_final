var insertMember = new Vue({
  el: '#insertMember',
  data: {
    members:[{
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
  }]
  },
  methods: {
    handleNewMemberForm() {
    fetch('api/members/addmembers.php', {
      method:'POST',
      body: JSON.stringify(this.members),
      headers:{
        "Content-Type": "application/json; charset=utf-8"
      }
      })

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
  }
});

function success() {
  alert("Member added successfully, redirecting to view members page");
  window.location.href = "viewmembers.html";
}
