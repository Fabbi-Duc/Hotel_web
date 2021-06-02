<template>
  <div>
    <ValidationObserver ref="form" v-slot="{ handleSubmit }">
      <form @submit.prevent="handleSubmit(update)" class="form">
        <div class="room-update row">
          <div class="col-4">
            <div class="image">
              <img
                v-if="pictureUrl"
                class="image-rounded"
                :src="pictureUrl"
                alt=""
              />
            </div>
            <label
              class="d-flex align-items-center add-image justify-content-center position-relative label--top f-w3"
            >
              <b-form-file
                :state="Boolean(avatar)"
                class="d-none"
                ref="form-file"
                v-model="avatar"
                v-on:change="chooseImage"
                accept="image/*"
              />
              <div class="text-center posision-absolute w-100 text-center">
                Add Image
              </div>
            </label>
          </div>
          <div class="col-8">
            <div class="form-group row">
              <div class="col-6">
                <label for="">First Name</label>
                <br />
                <ValidationProvider
                  name="First Name"
                  rules="required"
                  v-slot="{ errors }"
                >
                  <input
                    type="text"
                    class="form-control"
                    v-model="first_name"
                  />
                  <div class="text-left">
                    <span class="warning">{{ errors[0] }}</span>
                  </div>
                </ValidationProvider>
              </div>
              <div class="col-6">
                <label for="">Last Name</label>
                <br />
                <ValidationProvider
                  name="Last Name"
                  rules="required"
                  v-slot="{ errors }"
                >
                  <input type="text" class="form-control" v-model="last_name" />
                  <div class="text-left">
                    <span class="warning">{{ errors[0] }}</span>
                  </div>
                </ValidationProvider>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="">Phone</label>
                <br />
                <ValidationProvider
                  name="Phone"
                  rules="required"
                  v-slot="{ errors }"
                >
                  <input type="text" class="form-control" v-model="phone" />
                  <div class="text-left">
                    <span class="warning">{{ errors[0] }}</span>
                  </div>
                </ValidationProvider>
              </div>
              <div class="col-6">
                <label for="">Position</label>
                <br />
                <ValidationProvider
                  name="Position"
                  rules="required"
                  v-slot="{ errors }"
                >
                  <b-form-select
                    class="type__select form-control col"
                    v-model="position"
                    :options="positionOptions"
                  />
                  <div class="text-left">
                    <span class="warning">{{ errors[0] }}</span>
                  </div>
                </ValidationProvider>
              </div>
            </div>
            <div class="row">
              <div class="form-group col">
                <label for="">Gender</label>
                <br />
                <ValidationProvider
                  name="Gender"
                  rules="required"
                  v-slot="{ errors }"
                >
                  <b-form-select
                    class="type__select form-control col"
                    v-model="gender"
                    :options="genderOptions"
                  />
                  <div class="text-left">
                    <span class="warning">{{ errors[0] }}</span>
                  </div>
                </ValidationProvider>
              </div>
            </div>
            <div class="row">
              <div class="form-group col">
                <label for="">Ca làm việc</label>
                <br />
                <ValidationProvider
                  name="Gender"
                  rules="required"
                  v-slot="{ errors }"
                >
                  <b-form-select
                    class="type__select form-control col"
                    v-model="shift"
                    :options="shiftOptions"
                  />
                  <div class="text-left">
                    <span class="warning">{{ errors[0] }}</span>
                  </div>
                </ValidationProvider>
              </div>
            </div>
            <div class="row">
              <div class="form-group col">
                <label for="">Email</label>
                <br />
                <ValidationProvider
                  name="Email"
                  rules="required"
                  v-slot="{ errors }"
                >
                  <input type="email" v-model="email" class="form-control" />
                  <div class="text-left">
                    <span class="warning">{{ errors[0] }}</span>
                  </div>
                </ValidationProvider>
              </div>
            </div>
            <div class="row">
              <div class="form-group col">
                <label for="">Salary</label>
                <br />
                <ValidationProvider
                  name="Salary"
                  rules="required"
                  v-slot="{ errors }"
                >
                  <input type="number" min="4000000" v-model="salary" class="form-control" />
                  <div class="text-left">
                    <span class="warning">{{ errors[0] }}</span>
                  </div>
                </ValidationProvider>
              </div>
            </div>
            <div class="row">
              <div class="form-group col">
                <label for="">Birthday</label>
                <br />
                <ValidationProvider
                  name="Birthday"
                  rules="required"
                  v-slot="{ errors }"
                >
                  <input type="date" v-model="birthday" class="form-control" />
                  <div class="text-left">
                    <span class="warning">{{ errors[0] }}</span>
                  </div>
                </ValidationProvider>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center form-group">
          <button class="btn btn-primary mr-3" @click="update()">
            {{ id ? "Update" : "Create" }}
          </button>
        </div>
      </form>
    </ValidationObserver>
  </div>
</template>

<script>
import firebase from "@/plugins/firebase";
import { ValidationObserver, ValidationProvider } from "vee-validate";
import { mapGetters } from "vuex";

export default {
  components: {
    ValidationObserver,
    ValidationProvider,
  },
  data() {
    return {
      position: null,
      positionOptions: [
        { value: 0, text: "guard" },
        { value: 1, text: "sanitation worker" },
        { value: 2, text: "receptionists" },
        { value: 3, text: "chef" },
        { value: 4, text: "inventory management" },
        { value: 5, text: "admin" },
      ],
      avatar: null,
      pictureUrl: null,
      first_name: null,
      last_name: null,
      birthday: null,
      phone: null,
      email: null,
      gender: null,
      shift: null,
      salary: null,
      shiftOptions: [
        { value: 1, text: "Ca sáng" },
        { value: 2, text: "Ca tối" },
      ],
      genderOptions: [
        { value: 0, text: "Male" },
        { value: 1, text: "Female" },
      ],
    };
  },
  computed: {
    ...mapGetters({
      isLoading: "common/isLoading",
    }),
  },
  props: ["id"],
  mounted() {
    if (this.id) {
      this.$store.dispatch("common/setIsLoading", true);
      this.getInfoUser();
      this.$store.dispatch("common/setIsLoading", false);
    }
  },
  methods: {
    async update() {
      if (this.id) {
        const params = {
          id: this.id,
          first_name: this.first_name,
          last_name: this.last_name,
          birthday: this.birthday,
          position: this.position,
          gender: this.gender,
          email: this.email,
          phone: this.phone,
          image_url: this.pictureUrl,
          shift: this.shift,
          salary: this.salary,
        };
        await this.$store.dispatch("user/updateUser", params);
        this.$store.dispatch("common/setIsLoading", true);
        this.$router.push({ name: "Users" })
        this.$store.dispatch("common/setIsLoading", false);
      } else {
        const params = {
          first_name: this.first_name,
          last_name: this.last_name,
          birthday: this.birthday,
          position: this.position,
          gender: this.gender,
          email: this.email,
          phone: this.phone,
          image_url: this.pictureUrl,
          password: 123456,
          shift: this.shift,
          salary: this.salary,
          remember_token: null,
          email_verified_at: null
        };
        await this.$store.dispatch("user/createUser", params);
        this.$store.dispatch("common/setIsLoading", true);
        this.$router.push({ name: "Users" })
        this.$store.dispatch("common/setIsLoading", false);
      }
      this.$router.push({ name: "Users" })
    },
    chooseImage(event) {
      this.imageData = event.target.files[0];
      var storage = firebase.firebaseApp.storage();
      var storageRef = storage.ref();
      const imgRef = storageRef.child(`imagesRoom/${this.imageData.name}`);
      imgRef.put(this.imageData).then(() => {
        imgRef.getDownloadURL().then((url) => {
          this.pictureUrl = url;
        });
      });
    },

    async getInfoUser() {
      await this.$store.dispatch("user/getInfoUser", this.id).then((res) => {
        (this.gender = res.data.gender),
          (this.phone = res.data.phone),
          (this.first_name = res.data.firstname),
          (this.last_name = res.data.lastname),
          (this.position = res.data.position),
          (this.birthday = res.data.birthday),
          (this.email = res.data.email),
          (this.pictureUrl = res.data.image_user);
          this.shift = res.data.shift;
          this.salary = res.data.salary;
      });
    },
  },
};
</script>

<style class="scss" scoped>
.image {
  width: 100%;
  height: 413px;
  box-shadow: #00000029 0px 3px 15px;
}
img {
  width: 100%;
  height: 100%;
}
label {
  font-size: 18px;
  font-weight: bold;
}

.add-image {
  padding: 5px;
  width: 100px;
  height: 20px;
  margin: auto;
  box-shadow: #00000029 0px 3px 15px;
  border-radius: 5px;
  margin-top: 10px;
  background-color: white;
  font-size: 16px;
  font-weight: inherit;
}

.btn {
  width: 200px;
  margin-top: 50px;
}

.warning {
  color: red;
  font-size: 12px;
}
</style>
