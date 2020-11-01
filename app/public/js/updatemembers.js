var memberInfo = new Vue({
  el: '#memberInfo',
  data: {
    memberInfo: [],
    updatedMember: {},
    activeMember: null
  },
  computed: {
    activeMemberID() {
      return this.activeMember ? this.activeMember.memberID : ''
    },
    activeMemberFirstName() {
      return this.activeMember ? this.activeMember.fname : ''
    },
    activeMemberMiddleName() {
      return this.activeMember ? this.activeMember.mname : ''
    },
    activeMemberLastName() {
      return this.activeMember ? this.activeMember.lname : ''
    },
    activeMemberStreet() {
      return this.activeMember ? this.activeMember.street : ''
    },
    activeMemberCity() {
      return this.activeMember ? this.activeMember.city : ''
    },
    activeMemberState() {
      return this.activeMember ? this.activeMember.state : ''
    },
    activeMemberZipcode() {
      return this.activeMember ? this.activeMember.zip : ''
    },
    activeMemberPhone() {
      return this.activeMember ? this.activeMember.phone : ''
    },
    activeMemberEmail() {
      return this.activeMember ? this.activeMember.email : ''
    },
    activeMemberPosition() {
      return this.activeMember ? this.activeMember.position : ''
    },
    activeMemberStationID() {
      return this.activeMember ? this.activeMember.stationID : ''
    },
    activeMemberRadioNum() {
      return this.activeMember ? this.activeMember.radio_num : ''
    },
    activeMemberStatus() {
      return this.activeMember ? this.activeMember.status : ''
    }
  },
  methods: {
    updateMemberData(){
      return{
        memberID: "",
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
        stationID: "",
        radio_num: "",
        status:""
      }
    },
    viewMemberDetails() {
      fetch('api/members/viewmembers.php')
      .then(response => response.json())
      .then(json => { memberInfo.memberInfo = json })
    },
    editMemberData(){
      fetch("api/members/updatemembers.php",{
        method:'POST',
        body: JSON.stringify(this.updatedMember),
        headers: {
          "Content-Type": "application/json; charset=utf-8"
        }})
        .then( response => response.json() )
        .then( json => {
          console.log("Returned from comment create:", json);
          this.memberInfo = json;
          this.updatedMember = this.updateMemberData();
        });
      }
  },
  created() {
    this.viewMemberDetails();
  }
});

function success() {
  alert("Member modified successfully, redirecting to view members page");
  window.location.href = "viewmembers.html";
}
