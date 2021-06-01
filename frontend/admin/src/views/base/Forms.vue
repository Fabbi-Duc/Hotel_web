<template>
  <div>
    <CRow>
      <CCol sm="6">
        <CCard>
          <CCardHeader>
            <strong>Credit Card </strong> <small>Form</small>
            <div class="card-header-actions">
              <a
                class="card-header-action"
                href="https://coreui.io/vue/docs/components/form-components"
                rel="noreferrer noopener"
                target="_blank"
              >
                <small class="text-muted">docs</small>
              </a>
            </div>
          </CCardHeader>
          <CCardBody>
            <CRow>
              <CCol sm="12">
                <CInput label="Name" placeholder="Enter your name" />
              </CCol>
            </CRow>
            <CRow>
              <CCol sm="12">
                <CInput
                  label="Credit Card Number"
                  placeholder="0000 0000 0000 0000"
                />
              </CCol>
            </CRow>
            <CRow>
              <CCol sm="4">
                <CSelect
                  :options="[1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]"
                  label="Month"
                />
              </CCol>
              <CCol sm="4">
                <CSelect
                  :options="[
                    2014,
                    2015,
                    2016,
                    2017,
                    2018,
                    2019,
                    2020,
                    2021,
                    2022,
                    2023,
                    2024,
                    2025
                  ]"
                  label="Year"
                />
              </CCol>
              <CCol sm="4">
                <CInput label="CVV/CVC" placeholder="123" />
              </CCol>
            </CRow>
          </CCardBody>
        </CCard>
      </CCol>
      <CCol sm="6">
        <CCard>
          <CCardHeader>
            <strong>Company </strong><small>Form</small>
          </CCardHeader>
          <CCardBody>
            <CInput label="Company" placeholder="Enter your company name" />
            <CInput label="VAT" placeholder="PL1234567890" />
            <CInput label="Street" placeholder="Enter street name" />
            <CRow>
              <CCol sm="8">
                <CInput label="City" placeholder="Enter your city" />
              </CCol>
              <CCol sm="4">
                <CInput label="Postal code" placeholder="Postal code" />
              </CCol>
            </CRow>
            <CInput label="Country" placeholder="Country name" />
          </CCardBody>
        </CCard>
      </CCol>
    </CRow>
    <CRow>
      <CCol md="6">
        <CCard>
          <CCardHeader><strong>Basic Form</strong> Elements</CCardHeader>
          <CCardBody>
            <CForm>
              <CInput
                autocomplete="name"
                description="Let us know your full name."
                horizontal
                label="Enter your name"
              />
              <CInput horizontal label="Static" plaintext value="Username" />
              <CInput
                description="This is a help text"
                horizontal
                label="Text input"
                placeholder="Text"
              />
              <CInput horizontal label="Date" type="date" />
              <CInput
                autocomplete="email"
                description="Please enter your email"
                horizontal
                label="Email input"
                placeholder="Enter your email"
                type="email"
              />
              <CInput
                autocomplete="current-password"
                description="Please enter a complex password"
                horizontal
                label="Password Input"
                placeholder="Enter your password"
                type="password"
              />
              <CInput
                disabled
                horizontal
                label="Disabled Input"
                placeholder="Disabled"
              />
              <CTextarea
                horizontal
                label="Textarea"
                placeholder="Content..."
                rows="9"
              />
              <CSelect
                :options="options"
                horizontal
                label="Select"
                placeholder="Please select"
              />
              <CSelect
                :options="selectOptions"
                :value.sync="selectedOption"
                horizontal
                label="Large select"
                placeholder="Please select"
                size="lg"
              />
              <CSelect
                :options="options"
                custom
                horizontal
                label="Small select"
                placeholder="Please select"
                size="sm"
              />
              <CSelect
                :options="options"
                disabled
                horizontal
                label="Select"
                placeholder="Please select"
              />
              <template v-for="(name, key) in checkboxNames">
                <CRow :key="name" class="form-group" form>
                  <CCol class="col-form-label" sm="3" tag="label">
                    {{ name }}
                  </CCol>
                  <CCol :class="key % 2 === 1 ? 'form-inline' : ''" sm="9">
                    <CInputCheckbox
                      v-for="(option, optionIndex) in options"
                      :key="key + option"
                      :checked="optionIndex === key"
                      :custom="key > 1"
                      :inline="key % 2 === 1"
                      :label="option"
                      :name="`Option 1${key}`"
                      :value="option"
                    />
                  </CCol>
                </CRow>
              </template>
              <CRow class="form-group" form>
                <CCol class="col-form-label" sm="3" tag="label">
                  Switch checkboxes
                </CCol>
                <CCol sm="9">
                  <CSwitch :checked="true" class="mr-1" color="primary" />
                  <CSwitch
                    :checked="true"
                    class="mr-1"
                    color="success"
                    variant="outline"
                  />
                  <CSwitch
                    :checked="true"
                    class="mr-1"
                    color="warning"
                    variant="opposite"
                  />
                  <CSwitch
                    :checked="true"
                    class="mr-1"
                    color="danger"
                    shape="pill"
                  />
                  <CSwitch
                    :checked="true"
                    class="mr-1"
                    color="info"
                    shape="pill"
                    variant="outline"
                  />
                  <CSwitch
                    :checked="true"
                    class="mr-1"
                    color="dark"
                    shape="pill"
                    variant="opposite"
                  />
                </CCol>
              </CRow>
              <template v-for="(name, key) in radioNames">
                <CRow :key="name" class="form-group" form>
                  <CCol sm="3">
                    {{ name }}
                  </CCol>
                  <CInputRadioGroup
                    :checked="`Option ${key}`"
                    :custom="key > 1"
                    :inline="key % 2 === 1"
                    :options="options"
                    class="col-sm-9"
                  />
                </CRow>
              </template>
              <CInputFile horizontal label="File input" />
              <CInputFile horizontal label="Multiple file input" multiple />
              <CInputFile custom horizontal label="File custom input" />
              <CInputFile
                custom
                horizontal
                label="Multiple file custom input"
                multiple
              />
            </CForm>
          </CCardBody>
          <CCardFooter>
            <CButton color="primary" size="sm" type="submit">
              <CIcon name="cil-check-circle" />
              Submit
            </CButton>
            <CButton color="danger" size="sm" type="reset">
              <CIcon name="cil-ban" />
              Reset
            </CButton>
          </CCardFooter>
        </CCard>
        <CCard>
          <CCardHeader><strong>Inline</strong> Form</CCardHeader>

          <CCardBody>
            <!-- Bootstrap Vue has some problems with Inline forms that's why we use some standard bootstrap classes -->
            <CForm inline>
              <CInput class="mr-2" placeholder="Jane Doe">
                <template #label>
                  <small>Name:&nbsp;</small>
                </template>
              </CInput>
              <CInput autocomplete="email" placeholder="jane.doe@example.com">
                <template #label>
                  <small>Email:&nbsp;</small>
                </template>
              </CInput>
            </CForm>
          </CCardBody>
          <CCardFooter>
            <CButton color="primary" size="sm" type="submit">
              <CIcon name="cil-check-circle" />
              Submit
            </CButton>
            <CButton color="danger" size="sm" type="reset">
              <CIcon name="cil-ban" />
              Reset
            </CButton>
          </CCardFooter>
        </CCard>
      </CCol>
      <CCol md="6">
        <CCard>
          <CCardHeader><strong>Horizontal</strong> Form</CCardHeader>
          <CCardBody>
            <CForm>
              <CInput
                autocomplete="email"
                description="Please enter your email."
                horizontal
                label="Email"
                placeholder="Enter Email..."
                type="email"
              />
              <CInput
                autocomplete="current-password"
                description="Please enter your password."
                horizontal
                label="Password"
                placeholder="Enter Password..."
                type="password"
              />
            </CForm>
          </CCardBody>
          <CCardFooter>
            <CButton color="primary" size="sm" type="submit">
              <CIcon name="cil-check-circle" />
              Submit
            </CButton>
            <CButton color="danger" size="sm" type="reset">
              <CIcon name="cil-ban" />
              Reset
            </CButton>
          </CCardFooter>
        </CCard>
        <CCard>
          <CCardHeader><strong>Normal</strong> Form</CCardHeader>
          <CForm novalidate>
            <CCardBody>
              <CInput
                autocomplete="email"
                description="Please enter your email."
                label="Email"
                placeholder="Enter Email..."
                required
                type="email"
                was-validated
              />
              <CInput
                autocomplete="current-password"
                description="Please enter your password."
                label="Password"
                placeholder="Enter Password..."
                required
                type="password"
                was-validated
              />
            </CCardBody>
            <CCardFooter>
              <CButton color="primary" size="sm" type="submit">
                <CIcon name="cil-check-circle" />
                Submit
              </CButton>
              <CButton color="danger" size="sm" type="reset">
                <CIcon name="cil-ban" />
                Reset
              </CButton>
            </CCardFooter>
          </CForm>
        </CCard>
        <CCard>
          <CCardHeader> Input <strong>Grid</strong></CCardHeader>
          <CCardBody>
            <CRow class="form-group">
              <CCol sm="3">
                <CInput class="mb-0" placeholder=".col-sm-3" />
              </CCol>
            </CRow>
            <CRow class="form-group">
              <CCol sm="4">
                <CInput class="mb-0" placeholder=".col-sm-4" />
              </CCol>
            </CRow>
            <CRow class="form-group">
              <CCol sm="5">
                <CInput class="mb-0" placeholder=".col-sm-5" />
              </CCol>
            </CRow>
            <CRow class="form-group">
              <CCol sm="6">
                <CInput class="mb-0" placeholder=".col-sm-6" />
              </CCol>
            </CRow>
            <CRow class="form-group">
              <CCol sm="7">
                <CInput class="mb-0" placeholder=".col-sm-7" />
              </CCol>
            </CRow>
            <CRow class="form-group">
              <CCol sm="8">
                <CInput class="mb-0" placeholder=".col-sm-8" />
              </CCol>
            </CRow>
            <CRow class="form-group">
              <CCol sm="9">
                <CInput class="mb-0" placeholder=".col-sm-9" />
              </CCol>
            </CRow>
            <CRow class="form-group">
              <CCol sm="10">
                <CInput class="mb-0" placeholder=".col-sm-10" />
              </CCol>
            </CRow>
            <CRow class="form-group">
              <CCol sm="11">
                <CInput class="mb-0" placeholder=".col-sm-11" />
              </CCol>
            </CRow>
            <CRow class="form-group">
              <CCol sm="12">
                <CInput class="mb-0" placeholder=".col-sm-12" />
              </CCol>
            </CRow>
          </CCardBody>
          <CCardFooter>
            <CButton color="primary" size="sm" type="submit">
              <CIcon name="cil-user" />
              Login
            </CButton>
            <CButton color="danger" size="sm" type="reset">
              <CIcon name="cil-ban" />
              Reset
            </CButton>
          </CCardFooter>
        </CCard>
        <CCard>
          <CCardHeader> Input <strong>Sizes</strong></CCardHeader>
          <CCardBody>
            <CInput
              horizontal
              label="Small input"
              placeholder="size='sm'"
              size="sm"
            />
            <CInput horizontal label="Default input" placeholder="normal" />
            <CInput
              horizontal
              label="Large input"
              placeholder="size='lg'"
              size="lg"
            />
          </CCardBody>
          <CCardFooter>
            <CButton color="primary" size="sm" type="submit">
              <CIcon name="cil-check-circle" />
              Submit
            </CButton>
            <CButton color="danger" size="sm" type="reset">
              <CIcon name="cil-ban" />
              Reset
            </CButton>
          </CCardFooter>
        </CCard>
      </CCol>
    </CRow>
    <CRow>
      <CCol md="6" sm="12">
        <CCard>
          <CCardHeader><strong>Basic Validation</strong> Form</CCardHeader>
          <CCardBody>
            <CForm novalidate validated>
              <CInput
                label="Input is valid"
                valid-feedback="Input is not required."
              />
              <CInput
                invalid-feedback="Please provide a required input."
                label="Input is invalid"
                required
                valid-feedback="Thank you :)"
              />
            </CForm>
          </CCardBody>
        </CCard>
      </CCol>
      <CCol md="6" sm="12">
        <CCard>
          <CCardHeader><strong>Custom Validation</strong> Form</CCardHeader>
          <CCardBody>
            <CForm>
              <CInput
                :is-valid="validator"
                invalid-feedback="Please provide at least 4 characters."
                label="Input is valid"
                valid-feedback="Input is valid."
                value="Valid value"
              />
              <CInput
                :is-valid="validator"
                invalid-feedback="Please provide at least 4 characters."
                label="Input is invalid"
                valid-feedback="Thank you :)"
              />
            </CForm>
          </CCardBody>
        </CCard>
      </CCol>
    </CRow>
    <CRow>
      <CCol sm="4">
        <CCard>
          <CCardHeader><strong>Icon/Text</strong> Groups</CCardHeader>
          <CCardBody>
            <CInput placeholder="Username">
              <template #prepend-content>
                <CIcon name="cil-user" />
              </template>
            </CInput>
            <CInput autocomplete="email" placeholder="Email" type="email">
              <template #append-content>
                <CIcon name="cil-envelope-open" />
              </template>
            </CInput>
            <CInput append=".00" placeholder="ex. $1.000.000">
              <template #prepend-content>
                <CIcon name="cil-euro" />
              </template>
            </CInput>
          </CCardBody>
          <CCardFooter>
            <CButton color="success" size="sm" type="submit">
              <CIcon name="cil-check-circle" />
              Submit
            </CButton>
            <CButton color="danger" size="sm" type="reset">
              <CIcon name="cil-ban" />
              Reset
            </CButton>
          </CCardFooter>
        </CCard>
      </CCol>
      <CCol sm="4">
        <CCard>
          <CCardHeader><strong>Buttons</strong> Groups</CCardHeader>
          <CCardBody>
            <CInput placeholder="Username">
              <template #prepend>
                <CButton color="primary">
                  <CIcon name="cil-magnifying-glass" />
                  Search
                </CButton>
              </template>
            </CInput>
            <CInput autocomplete="email" placeholder="Email" type="email">
              <template #append>
                <CButton color="primary" type="submit">Submit</CButton>
              </template>
            </CInput>
            <CInput autocomplete="email" placeholder="Email" type="email">
              <template #prepend>
                <CButton color="primary">
                  <CIcon name="cib-facebook" />
                </CButton>
              </template>
              <template #append>
                <CButton color="primary">
                  <CIcon name="cib-twitter" />
                </CButton>
              </template>
            </CInput>
          </CCardBody>
          <CCardFooter>
            <CButton color="success" size="sm" type="submit">
              <CIcon name="cil-check-circle" />
              Submit
            </CButton>
            <CButton color="danger" size="sm" type="reset">
              <CIcon name="cil-ban" />
              Reset
            </CButton>
          </CCardFooter>
        </CCard>
      </CCol>
      <CCol sm="4">
        <CCard>
          <CCardHeader><strong>Dropdowns</strong> Groups</CCardHeader>
          <CCardBody>
            <CInput placeholder="Username">
              <template #prepend>
                <CDropdown color="primary" togglerText="Action">
                  <CDropdownItem>Action</CDropdownItem>
                  <CDropdownItem>Another action</CDropdownItem>
                  <CDropdownItem>Something else here...</CDropdownItem>
                  <CDropdownItem disabled>Disabled action</CDropdownItem>
                </CDropdown>
              </template>
            </CInput>
            <CInput autocomplete="email" placeholder="Email" type="email">
              <template #append>
                <CDropdown color="primary" right togglerText="Action">
                  <CDropdownItem>Action</CDropdownItem>
                  <CDropdownItem>Another action</CDropdownItem>
                  <CDropdownItem>Something else here...</CDropdownItem>
                  <CDropdownItem disabled>Disabled action</CDropdownItem>
                </CDropdown>
              </template>
            </CInput>
            <CInput placeholder="...">
              <template #prepend>
                <CDropdown color="primary" split togglerText="Split">
                  <CDropdownItem href="#">Action</CDropdownItem>
                  <CDropdownItem href="#">Another action</CDropdownItem>
                  <CDropdownItem href="#">Something else here...</CDropdownItem>
                  <CDropdownItem disabled>Disabled action</CDropdownItem>
                </CDropdown>
              </template>

              <template #append>
                <CDropdown color="primary" right togglerText="Action">
                  <CDropdownItem>Action</CDropdownItem>
                  <CDropdownItem>Another action</CDropdownItem>
                  <CDropdownItem>Something else here...</CDropdownItem>
                  <CDropdownItem disabled>Disabled action</CDropdownItem>
                </CDropdown>
              </template>
            </CInput>
          </CCardBody>
          <CCardFooter>
            <CButton color="success" size="sm" type="submit">
              <CIcon name="cil-check-circle" />
              Submit
            </CButton>
            <CButton color="danger" size="sm" type="reset">
              <CIcon name="cil-ban" />
              Reset
            </CButton>
          </CCardFooter>
        </CCard>
      </CCol>
    </CRow>
    <CRow>
      <CCol md="6">
        <CCard>
          <CCardHeader>
            Use the grid for big devices!
            <small
              ><code>.col-lg-*</code> <code>.col-md-*</code>
              <code>.col-sm-*</code></small
            >
          </CCardHeader>
          <CCardBody>
            <CRow
              v-for="(number, key) in [4, 5, 6, 7, 8]"
              :key="key"
              class="form-group"
            >
              <CCol :col="12 - number">
                <CInput :placeholder="`.col-md-${12 - number}`" class="mb-0" />
              </CCol>
              <CCol :col="number">
                <CInput :placeholder="`.col-md-${number}`" class="mb-0" />
              </CCol>
            </CRow>
          </CCardBody>
          <CCardFooter>
            <CButton color="primary" size="sm">Action</CButton>
            <CButton color="danger" size="sm">Action</CButton>
            <CButton color="warning" size="sm">Action</CButton>
            <CButton color="info" size="sm">Action</CButton>
            <CButton color="success" size="sm">Action</CButton>
          </CCardFooter>
        </CCard>
      </CCol>
      <CCol md="6">
        <CCard>
          <CCardHeader>
            Input Grid for small devices! <small> <code>.col-*</code></small>
          </CCardHeader>
          <CCardBody>
            <CRow
              v-for="(number, key) in [4, 5, 6, 7, 8]"
              :key="key"
              class="form-group"
            >
              <CCol :col="number">
                <CInput :placeholder="`.col-${number}`" class="mb-0" />
              </CCol>
              <CCol :col="12 - number">
                <CInput :placeholder="`.col-${12 - number}`" class="mb-0" />
              </CCol>
            </CRow>
          </CCardBody>
          <CCardFooter>
            <CButton color="primary" size="sm">Action</CButton>
            <CButton color="danger" size="sm">Action</CButton>
            <CButton color="warning" size="sm">Action</CButton>
            <CButton color="info" size="sm">Action</CButton>
            <CButton color="success" size="sm">Action</CButton>
          </CCardFooter>
        </CCard>
      </CCol>
    </CRow>
    <CRow>
      <CCol sm="4">
        <CCard>
          <CCardHeader>
            Example Form
          </CCardHeader>
          <CCardBody>
            <CForm>
              <CInput prepend="Username">
                <template #append-content>
                  <CIcon name="cil-user" />
                </template>
              </CInput>
              <CInput autocomplete="email" prepend="Email" type="email">
                <template #append-content>
                  <CIcon name="cil-envelope-closed" />
                </template>
              </CInput>
              <CInput
                autocomplete="current-password"
                prepend="Password"
                type="password"
              >
                <template #append-content>
                  <CIcon name="cil-shield-alt" />
                </template>
              </CInput>
              <div class="form-group form-actions">
                <CButton color="primary" size="sm" type="submit">
                  Submit
                </CButton>
              </div>
            </CForm>
          </CCardBody>
        </CCard>
      </CCol>
      <CCol sm="4">
        <CCard>
          <CCardHeader>
            Example Form
          </CCardHeader>
          <CCardBody>
            <CForm>
              <CInput placeholder="Username">
                <template #append-content>
                  <CIcon name="cil-user" />
                </template>
              </CInput>
              <CInput autocomplete="email" placeholder="Email" type="email">
                <template #append-content>
                  <CIcon name="cil-envelope-closed" />
                </template>
              </CInput>
              <CInput
                autocomplete="current-password"
                placeholder="Password"
                type="password"
              >
                <template #append-content>
                  <CIcon name="cil-shield-alt" />
                </template>
              </CInput>
              <div class="form-group form-actions">
                <CButton class="btn btn-sm btn-secondary" type="submit">
                  Submit
                </CButton>
              </div>
            </CForm>
          </CCardBody>
        </CCard>
      </CCol>
      <CCol sm="4">
        <CCard>
          <CCardHeader>
            Example Form
          </CCardHeader>
          <CCardBody>
            <CForm>
              <CInput placeholder="Username">
                <template #prepend-content>
                  <CIcon name="cil-user" />
                </template>
              </CInput>
              <CInput autocomplete="email" placeholder="Email" type="email">
                <template #prepend-content>
                  <CIcon name="cil-envelope-closed" />
                </template>
              </CInput>
              <CInput
                autocomplete="current-password"
                placeholder="Password"
                type="password"
              >
                <template #prepend-content>
                  <CIcon name="cil-shield-alt" />
                </template>
              </CInput>
              <div class="form-group form-actions">
                <CButton color="success" size="sm" type="submit">
                  Submit
                </CButton>
              </div>
            </CForm>
          </CCardBody>
        </CCard>
      </CCol>
    </CRow>
    <CRow>
      <CCol lg="12">
        <transition name="fade">
          <CCard v-if="show">
            <CCardHeader>
              <CIcon name="cil-pencil" />
              Form Elements
              <div class="card-header-actions">
                <CLink class="card-header-action btn-setting" href="#">
                  <CIcon name="cil-settings" />
                </CLink>
                <CLink
                  class="card-header-action btn-minimize"
                  @click="formCollapsed = !formCollapsed"
                >
                  <CIcon
                    :name="`cil-chevron-${formCollapsed ? 'bottom' : 'top'}`"
                  />
                </CLink>
                <CLink
                  class="card-header-action btn-close"
                  href="#"
                  v-on:click="show = !show"
                >
                  <CIcon name="cil-x-circle" />
                </CLink>
              </div>
            </CCardHeader>
            <CCollapse :show="formCollapsed">
              <CCardBody>
                <CInput
                  autocomplete="email"
                  description="Here's some help text"
                  label="Prepended text"
                  prepend="@"
                  type="email"
                />
                <CInput
                  append=".00"
                  description="Here's some help text"
                  label="Appended text"
                />
                <CInput
                  append=".00"
                  description="Here's some help text"
                  label="Appended and prepended text"
                  prepend="$"
                />
                <CInput
                  description="Here's some help text"
                  label="Append with button"
                >
                  <template #append>
                    <CButton color="primary">Go!</CButton>
                  </template>
                </CInput>
                <CInput label="Two-buttons append">
                  <template #append>
                    <CButton color="primary">Search</CButton>
                    <CButton color="danger">Options</CButton>
                  </template>
                </CInput>
                <div class="form-actions">
                  <CButton color="primary" type="submit">Save changes</CButton>
                  <CButton color="secondary">Cancel</CButton>
                </div>
              </CCardBody>
            </CCollapse>
          </CCard>
        </transition>
      </CCol>
    </CRow>
  </div>
</template>

<script>
export default {
  name: "Forms",
  data() {
    return {
      selected: [], // Must be an array reference!
      show: true,
      horizontal: { label: "col-3", input: "col-9" },
      options: ["Option 1", "Option 2", "Option 3"],
      selectOptions: [
        "Option 1",
        "Option 2",
        "Option 3",
        {
          value: "some value",
          label: "Selected option"
        }
      ],
      selectedOption: "some value",

      formCollapsed: true,
      checkboxNames: [
        "Checkboxes",
        "Inline Checkboxes",
        "Checkboxes - custom",
        "Inline Checkboxes - custom"
      ],
      radioNames: [
        "Radios",
        "Inline Radios",
        "Radios - custom",
        "Inline Radios - custom"
      ]
    };
  },
  methods: {
    validator(val) {
      return val ? val.length >= 4 : false;
    }
  }
};
</script>
