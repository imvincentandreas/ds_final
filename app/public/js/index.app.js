var insertMember = new Vue({
  el: '#insertMember',
  data: {
    members: {}
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
  }
});

function success() {
  alert("User Successfully Added");
}
