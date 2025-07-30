  # Use a Node.js base image
  FROM node:20-alpine

  # Set the working directory inside the container
  WORKDIR /app

  # Copy package.json and package-lock.json (if present) to install dependencies
  COPY package*.json ./

  # Install application dependencies
  RUN npm install

  # Copy the rest of the application files
  COPY . .

  # Build the React application for production
  RUN npm run build

  # Use a lightweight Nginx image to serve the built application
  FROM nginx:alpine

  # Copy the built React app from the previous stage to Nginx's HTML directory
  COPY --from=0 /app/build /usr/share/nginx/html

  # Expose port 80 for web traffic
  EXPOSE 80

  # Start Nginx when the container launches
  CMD ["nginx", "-g", "daemon off;"]