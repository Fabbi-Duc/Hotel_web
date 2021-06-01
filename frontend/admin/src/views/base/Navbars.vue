<template>
  <div>
    <CCard>
      <CCardHeader>
        <CIcon name="cil-justify-center" />
        <strong> Bootstrap Navbar </strong>
        <div class="card-header-actions">
          <a
            class="card-header-action"
            href="https://coreui.io/vue/docs/components/navbar"
            rel="noreferrer noopener"
            target="_blank"
          >
            <small class="text-muted">docs</small>
          </a>
        </div>
      </CCardHeader>
      <CCardBody>
        <CNavbar color="info" expandable="md">
          <CToggler inNavbar @click="show = !show" />
          <CNavbarBrand href="#">NavBar</CNavbarBrand>
          <CCollapse :show="show" navbar>
            <CNavbarNav>
              <CNavItem href="#">Link</CNavItem>
              <CNavItem disabled href="#">Disabled</CNavItem>
            </CNavbarNav>

            <!-- Right aligned nav items -->
            <CNavbarNav class="ml-auto">
              <CForm class="align-middle" inline>
                <CInput class="mr-2 my-0" placeholder="Search" size="sm" />
                <CButton color="light" size="sm">
                  Search
                </CButton>
              </CForm>

              <CDropdown in-nav toggler-text="Lang">
                <CDropdownItem>EN</CDropdownItem>
                <CDropdownItem>ES</CDropdownItem>
                <CDropdownItem>RU</CDropdownItem>
                <CDropdownItem>FA</CDropdownItem>
              </CDropdown>

              <CDropdown in-nav toggler-text="User">
                <CDropdownItem>Profile</CDropdownItem>
                <CDropdownItem>Signout</CDropdownItem>
              </CDropdown>
            </CNavbarNav>
          </CCollapse>
        </CNavbar>
      </CCardBody>
    </CCard>
    <CCard>
      <CCardHeader>
        <CIcon name="cil-justify-center" />
        <strong> Navbar </strong>
        <small>brand</small>
      </CCardHeader>
      <CCardBody>
        <!-- Image and text -->
        <CNavbar color="faded" light>
          <CNavbarBrand href="#">
            <img
              alt="CoreuiVue"
              class="d-inline-block align-top"
              src="https://placekitten.com/g/30/30"
            />
            CoreuiVue
          </CNavbarBrand>
        </CNavbar>
      </CCardBody>
    </CCard>
    <CCard>
      <CCardHeader>
        <CIcon name="cil-justify-center" />
        <strong> Navbar </strong>
        <small>text</small>
      </CCardHeader>
      <CCardBody>
        <CNavbar color="light" light toggleable="sm">
          <CToggler inNavbar @click="navbarText = !navbarText" />
          <CNavbarBrand>CoreuiVue</CNavbarBrand>
          <CCollapse :show="navbarText" navbar>
            <CNavbarNav>
              <CNavbarText>Navbar text</CNavbarText>
            </CNavbarNav>
          </CCollapse>
        </CNavbar>
      </CCardBody>
    </CCard>
    <CCard>
      <CCardHeader>
        <CIcon name="cil-justify-center" />
        <strong> Navbar </strong>
        <small>dropdown</small>
      </CCardHeader>
      <CCardBody>
        <CNavbar color="primary" expandable="sm">
          <CToggler inNavbar @click="navbarDropdown = !navbarDropdown" />
          <CCollapse :show="navbarDropdown" navbar>
            <CNavbarNav>
              <CNavItem href="#">Home</CNavItem>
              <CNavItem href="#">Link</CNavItem>
              <!-- Navbar dropdowns -->
              <CDropdown in-nav toggler-text="Lang">
                <CDropdownItem>EN</CDropdownItem>
                <CDropdownItem>ES</CDropdownItem>
                <CDropdownItem>RU</CDropdownItem>
                <CDropdownItem>FA</CDropdownItem>
              </CDropdown>
              <CDropdown in-nav toggler-text="User">
                <CDropdownItem>Account</CDropdownItem>
                <CDropdownItem>Settings</CDropdownItem>
              </CDropdown>
            </CNavbarNav>
          </CCollapse>
        </CNavbar>
      </CCardBody>
    </CCard>
    <CCard>
      <CCardHeader>
        <CIcon name="cil-justify-center" />
        <strong> Navbar </strong>
        <small>form</small>
      </CCardHeader>
      <CCardBody>
        <CNavbar color="light" light>
          <CForm inline>
            <CInput class="mr-sm-2" placeholder="Search" size="sm" />
            <CButton class="my-2 my-sm-0" color="outline-success" type="submit"
              >Search
            </CButton>
          </CForm>
        </CNavbar>
      </CCardBody>
    </CCard>
    <CCard>
      <CCardHeader>
        <CIcon name="cil-justify-center" />
        <strong> Navbar </strong>
        <small>input group</small>
      </CCardHeader>
      <CCardBody>
        <CNavbar color="light" light>
          <CForm inline>
            <CInput class="mr-sm-2" placeholder="Username" />
          </CForm>
        </CNavbar>
      </CCardBody>
    </CCard>
  </div>
</template>
<script>
export default {
  name: "Navbars",
  data() {
    return {
      show: false,
      navbarText: false,
      navbarDropdown: false
    };
  }
};
</script>
