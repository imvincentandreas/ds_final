var app = new Vue({
  el: '#triagePage',
  data: {
    memberList: [],
    visitList: [],
    activeMember: null,
    triageForm: {},
    newMemberForm: {}
  },
  computed: {
    activeMemberName() {
      return this.activeMember ? this.activeMember.lastName + ', ' + this.activeMember.firstName : ''
    }
  },
  methods: {
    newMemberData() {
      return {
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
    },
    /* newTriageData() {
      return {
        priority: "",
        visitDate: "",
        visitDescription: ""
      }
    }, */
    handleNewMemberForm( evt ) {
      fetch('api/members/addmembers.php', {
        method:'POST',
        body: JSON.stringify(this.newMemberForm),
        headers: {
          "Content-Type": "application/json; charset=utf-8"
        }
      })
      .then( response => response.text() );

    }

      /*,
      created() {
      fetch("api/records/")
      .then( response => response.json() )
      .then( json => {
      this.ptList = json;

      console.log(json)}
      );

      fetch("api/visits/")
      .then( response => response.json() )
      .then( json => {
      this.visitList = json;

      console.log(json)}
      );

      this.newMemberForm = this.newMemberData();
      this.newTriageForm = this.newTriageData();
      } */

  }
});
