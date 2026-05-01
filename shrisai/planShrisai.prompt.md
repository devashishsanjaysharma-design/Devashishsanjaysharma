## Plan: Upload Local Folder to GitHub

TL;DR - Initialize the folder as a Git repository, commit the files, create a GitHub repo, add the remote, and push.

**Steps**
1. Confirm the local folder is not yet a git repo.
2. Initialize git in `c:\Users\win3\Desktop\shrisai` using `git init`.
3. Add all files with `git add .`.
4. Create the first commit with `git commit -m "Initial commit"`.
5. Create a repository on GitHub manually or via GitHub CLI.
6. Add the GitHub remote with `git remote add origin <repository-URL>`.
7. Push the commit with `git push -u origin main` (or `master` if the default branch is `master`).

**Verification**
1. Check that `git status` shows no pending changes after commit.
2. Confirm `git remote -v` shows the GitHub URL.
3. Open the GitHub repository page and verify both files are uploaded.

**Decisions**
- The folder is not currently a git repo, so initialization is required.
- A GitHub repository must be created and linked as a remote before pushing.
