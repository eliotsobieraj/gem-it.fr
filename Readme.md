
# 🌟 **GEM-IT** 🌟

Creating a website using the Symfony framework and Tailwind CSS.

⚠️ **Prerequisite**: Docker must be installed on your machine.

> **Note**: if you don't have make installed on your pc you may want to look at what each alias refers to in the Makefile

---

## 🚀 **Getting Started**

### 🏁 Launch the Application

```bash
make
```

### 📦 After launching, run:

```bash
make asset
make migration
```

🌐 Open [http://localhost:8000](http://localhost:8000) in your browser to see the result.

🔗 **Useful Links**:

- **PhpMyAdmin**: [http://localhost:8080](http://localhost:8080)

> **Note**: After each modification to CSS or JS, run the following command to compile assets:
```bash
make asset
```

---

## 🛠 **Useful Commands**

### 🔨 Build the Project

```bash
make build
```

### 📥 Install All Dependencies

```bash
make install
```

### ⬆️ Start the Project

```bash
make up
```

### ⬇️ Stop Containers

```bash
make down
```

### 🖥️ Execute Commands Inside the Container

```bash
make exec
```

---

## 🗄️ **Database**

### 📑 Run Migrations

```bash
make migration
```

---

## 🎨 **Asset Management**

### 📦 Compile Assets

```bash
make asset
```

---