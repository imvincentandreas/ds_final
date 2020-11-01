var certificateInfo = new Vue({
  el: '#memberInfo',
  data: {
    member: [],
    members: {}
  },
  methods: {
    fetchMembers() {
      fetch('api/members/viewmembers.php')
      .then(response => response.json())
      .then(json => { certificateInfo.member = json })
    },

    handleDeleteMemberForm() {
      fetch('api/members/deletemembers.php', {
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
          memberID: ""
        }
      }
  },
  created() {
    this.fetchMembers();
  }
});

function success() {
  alert("Member deleted successfully, redirecting to view members page");
  window.location.href = "viewmembers.html";
}
